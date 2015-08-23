<?php

namespace App\Http\Controllers;

use App\BrokenDrug;
use App\DispensedDrug;
use App\Distributor;
use App\Drug;
use App\DrugMovement;
use App\Http\Requests\AddDrugRequest;
use App\Http\Requests\CreateDrugRequest;
use App\Http\Requests\DispenseBrokenDrugRequest;
use App\Http\Requests\DispenseDrugRequest;
use App\InventoryDrug;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class InventoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

//        $drugs = Drug::latest()->get();
        $drugs = Drug::owned()->get();

        return view('inventory.index', compact('drugs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $pharmacists = Session::get('data.pharmacy')->pharmacists;
        $drugs = Drug::owned()->get();
        $distributors = Distributor::where('pharmacy_id', Session::get('data.pharmacy')->id)->get();

        $create = true;
        return view('inventory.create', compact('pharmacists', 'drugs', 'create', 'distributors'));
    }

    /**
     * Show the form for creating a drug log.
     *
     * @return Response
     */
    public function logDrug()
    {
        $pharmacists = Session::get('data.pharmacy')->pharmacists;
        $drugs = Drug::owned()->get();
        $log_drug = true;
        return view('inventory.log-drug', compact('pharmacists', 'drugs', 'log_drug'));
    }

    /**
     * Show the form for creating a broken/expired drug log.
     *
     * @return Response
     */
    public function logBroken()
    {
        $pharmacists = Session::get('data.pharmacy')->pharmacists;
        $drugs = Drug::owned()->get();
        $log_broken = true;
        return view('inventory.log-broken', compact('pharmacists', 'drugs', 'log_broken'));
    }

    /**
     * Show the form for adding of drugs.
     *
     * @return Response
     */
    public function add()
    {
        $pharmacists = Session::get('data.pharmacy')->pharmacists;
        $drugs = Drug::owned()->get();
        return view('inventory.add-drug', compact('pharmacists', 'drugs'));
    }

    /**
     * Get curretn Stock On Hand (SOH)
     *
     * @return Response
     */
    public function getSoh(Request $request)
    {
        $drug = Drug::where('ndc', $request->get('ndc'))->first();
        $quantity = 0;
        $message = 'Invalid NDC or NDC not recorded yet';
        $success = false;
        $name = '';
        if (count($drug) > 0) {
            $quantity = $drug->quantity;
            $name = $drug->name;
            $message = 'NDC found!';
            $success = true;
        }

        $soh = $quantity;
        $positive_soh = $quantity + $request->get('quantity');
        $negative_soh = $quantity - $request->get('quantity');

        return response()->json(compact('success','message','soh','positive_soh','negative_soh', 'name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CreateDrugRequest $request)
    {

        $drug = Drug::where('ndc', $request->get('ndc'))->first();

        if (count($drug) == 0) {
            if ($request->get('to_from') == 'to') {
                return response()->json(['success' => false, 'message' => 'NDC Invalid, No drugs available to dispense to other manufacturer']);
            }
        }

        if ($request->get('to_from') == 'from') {
            $drug->quantity += $request->get('quantity');
        } else {
            $drug->quantity -= $request->get('quantity');

            if ($drug->quantity < 0) {
                return response()->json(['success' => false, 'message' => 'Available drugs are lesser than selected dispense quantity']);
            }
        }

        $drug_movements = new DrugMovement([
            "current_soh"         => $drug->quantity,
            "type"                => (($request->get('to_from') == 'from') ? Drug::INCOMING : Drug::OUTGOING),
            "created_at"             => $request->get("date_dispensed"),
            "pharmacist_id"       => $request->get('pharmacist'),
            "quantity"            => $request->get('quantity'),
        ]);

        $inventory_drug = new InventoryDrug([
            "drug_id"             => $drug->id,
            "dea_no"              => $request->get('dea'),
            "is_incoming"         => ($request->get('to_from') == 'from'),
            "distributor_id"      => $request->get('pharmacy'),
            "created_at"          => $request->get('date_dispensed'),
        ]);

        $drug->drugMovements()->save($drug_movements);
        $drug_movements->inventoryDrug()->save($inventory_drug);

        // Update the quantity
        $drug->save();

        return response()->json(['success' => true, 'message' => 'Inventory log has been added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

        $drug = Drug::where('id', Crypt::decrypt($id))->owned()->first();

        if (count($drug) == 0) {
            return response()->json(['success' => false, 'message' => 'Drug information is invalid']);
        }

        $drug_logs = DrugMovement::with(['pharmacist','dispensedDrug', 'inventoryDrug' => function($query){
                $query->with('distributor');
            }, 'brokenDrug'])->where(['drug_id' => $drug->id])->get();

        return view('inventory.show-details', compact('drug_logs', 'drug'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id = '')
    {
        //
        return response()->json(['success' => true, 'message' => 'Logging successful!']);
    }

    /**
     * Log the drug for dispensing of customer
     *
     * @param  int  $id
     * @return Response
     */
    public function dispense(DispenseDrugRequest $request)
    {
        $drug = Drug::where('ndc', $request->get('ndc'))->first();

        if (count($drug) == 0) {
            return response()->json(['success' => false, 'message' => 'NDC is invalid or no record yet']);
        }

        if ($request->get('chk_return')) {
            $drug->quantity += $request->get('quantity');
        } else {
            $drug->quantity -= $request->get('quantity');
            if ($drug->quantity < 0) {
                return response()->json(['success' => false, 'message' => 'Available drugs are lesser than selected dispense quantity']);
            }
        }

        $drug_movements = new DrugMovement([
            "current_soh"         => $drug->quantity,
            "type"                => ($request->get('chk_return') ? Drug::RTS : Drug::DISPENSE),
            "created_at"          => $request->get("date_dispensed"),
            "pharmacist_id" => $request->get('pharmacist'),
            "quantity" => $request->get('quantity'),
        ]);

        $dispensed_drug = new DispensedDrug([
            "drug_id" => $drug->id,
            "rx_no" => $request->get('rx_no'),
            "date_in" => $request->get('date_written'),
            "created_at" => $request->get('date_dispensed'),
        ]);

        $drug->drugMovements()->save($drug_movements);
        $drug_movements->dispensedDrug()->save($dispensed_drug);

        // Update the quantity
        $drug->save();

        return response()->json(['success' => true, 'message' => 'Logging successful!']);
    }

    /**
     * Log the drug for dispensing of customer
     *
     * @param  int  $id
     * @return Response
     */
    public function dispenseBroken(DispenseBrokenDrugRequest $request)
    {

        $drug = Drug::where('ndc', $request->get('ndc'))->first();

        if (count($drug) == 0) {
            return response()->json(['success' => false, 'message' => 'NDC is invalid or no record yet']);
        }

        $drug->quantity -= $request->get('quantity');

        $drug_movements = new DrugMovement([
            "current_soh"         => $drug->quantity,
            "type"                => $request->get('log_type'),
            "created_at"             => $request->get("date_dispensed"),
            "pharmacist_id" => $request->get('pharmacist'),
            "quantity"  => $request->get('quantity'),
        ]);

        $broken_drug = new BrokenDrug([
            "drug_id" => $drug->id,
            "created_at"  => $request->get('date_dispensed'),
        ]);

        $drug->drugMovements()->save($drug_movements);
        $drug_movements->brokenDrug()->save($broken_drug);

        // Update the quantity
        $drug->save();

        return response()->json(['success' => true, 'message' => 'Loggig successful!']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function addDrug(AddDrugRequest $request)
    {

        $drug = Drug::where('ndc', $request->get('ndc'))->first();

        if (count($drug) > 0) {
            return response()->json(['success' => 'false', 'message' => 'Duplicate NDC, NDC number already logged in the inventory']);
        }

        // No records yet
        $drug = Drug::create([
                "pharmacy_id"     => Session::get('data.pharmacy')->id,
                "name"            => $request->get('name'),
                "strength"        => $request->get('strength'),
                "form"            => $request->get('form'),
                "manufacturer"    => $request->get('manufacturer'),
                "ndc"             => $request->get('ndc'),
                "quantity"        => $request->get('quantity'),
                "threshold_alert" => $request->get('threshold'),
                "created_at"      => $request->get('date_dispensed'),
            ]);

        $drug_movements = new DrugMovement([
                "current_soh"         => $drug->quantity,
                "type"                => Drug::ADD,
                "quantity"        => $request->get('quantity'),
                "pharmacist_id"        => $request->get('pharmacist'),
            ]);


        $drug->drugMovements()->save($drug_movements);
        $drug->save();
        return response()->json(['success' => true, 'message' => 'Inventory log has been added']);
    }

    public function checkScript() {

        return view('inventory.check-script');
    }

    public function searchScript($rx) {

        $dispensed_drug = DispensedDrug::where("rx_no", $rx)->first();

        if (count($dispensed_drug) == 0) {
            return response()->json(['success' => false, 'message' => 'RX Number not found!']);
        }

        $drug = Drug::where('id', $dispensed_drug->drug_id)->owned()->first();

        if (count($drug) == 0) {
            return response()->json(['success' => false, 'message' => 'Drug information is invalid']);
        }

        $drug_logs = DrugMovement::with(['pharmacist','dispensedDrug', 'inventoryDrug' => function($query){
                $query->with('distributor');
            }, 'brokenDrug'])->where(['drug_id' => $drug->id])->get();

        return response()->json(['success' => true, 'message' =>view('inventory.show-details', compact('drug_logs', 'drug', 'rx'))->render()]);
    }
}
