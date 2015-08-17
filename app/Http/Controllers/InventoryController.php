<?php

namespace App\Http\Controllers;

use App\Drug;
use App\DrugMovement;
use App\Http\Requests\CreateDrugRequest;
use App\Http\Requests\DispenseBrokenDrugRequest;
use App\Http\Requests\DispenseDrugRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
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
        $drugs = Drug::latest()->get();

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

        return view('inventory.create', compact('pharmacists'));
    }

    /**
     * Show the form for creating a drug log.
     *
     * @return Response
     */
    public function logDrug()
    {
        $pharmacists = Session::get('data.pharmacy')->pharmacists;
        $drugs = Drug::all('*');
        return view('inventory.log-drug', compact('pharmacists', 'drugs'));
    }

    /**
     * Show the form for creating a broken/expired drug log.
     *
     * @return Response
     */
    public function logBroken()
    {
        $pharmacists = Session::get('data.pharmacy')->pharmacists;
        $drugs = Drug::all('*');
        return view('inventory.log-broken', compact('pharmacists', 'drugs'));
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
        if (count($drug) > 0) {
            $quantity = $drug->quantity;
            $message = 'NDC found!';
            $success = true;
        }

        $soh = $quantity;
        $positive_soh = $quantity + $request->get('quantity');
        $negative_soh = $quantity - $request->get('quantity');

        return response()->json(compact('success','message','soh','positive_soh','negative_soh'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CreateDrugRequest $request)
    {

        $manufacturer = $request->get('pharmacy');
        if ($request->get('other')) {
            $manufacturer = $request->get('other_pharmacy');
        }

        $drug = Drug::where('ndc', $request->get('ndc'))->first();

        if (count($drug) == 0) {
            if ($request->get('to_from') == 'to') {
                return response()->json(['success' => false, 'message' => 'NDC Invalid, No drugs available to dispense to other manufacturer']);
            }

            // No records yet
            $drug = Drug::create([
                    "pharmacy_id"     => Session::get('data.pharmacy')->id,
                    "ndc"             => $request->get('ndc'),
                    "name"            => '',
                    "strength"        => '',
                    "form"            => '',
                    "quantity"        => $request->get('quantity'),
                    "threshold_alert" => $request->get('threshold'),
                    "dea_no"          => $request->get('dea'),
                    "manufacturer"    => $manufacturer,
                    "created_at"      => $request->get('date_dispensed'),
                ]);
        } else {
            if ($request->get('to_from') == 'from') {
                $drug->quantity += $request->get('quantity');
            } else {
                $drug->quantity -= $request->get('quantity');

                if ($drug->quantity < 0) {
                    return response()->json(['success' => false, 'message' => 'Available drugs are lesser than selected dispense quantity']);
                }
            }
        }

        $drug_movements = new DrugMovement([
            "pharmacist_id"       => $request->get('pharmacist'),
            "dea_no"              => $request->get('dea'),
            "rx_no"               => '',
            "invoice_no"          => $request->get('invoice'),
            "quantity"            => $request->get('quantity'),
            "other_manufacturer"  => ($request->get('other')) ? "1" : "0",
            "manufacturer"        => $manufacturer,
            "type"                => (($request->get('to_from') == 'from') ? Drug::INCOMING : Drug::OUTGOING),
            "date_in"             => $request->get("date_dispensed"),
        ]);


        $drug->drugMovements()->save($drug_movements);
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
        //
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
        }

        $drug_movements = new DrugMovement([
            "pharmacist_id"       => $request->get('pharmacist'),
            "dea_no"              => '',
            "rx_no"               => $request->get('rx_no'),
            "invoice_no"          => '',
            "quantity"            => $request->get('quantity'),
            "other_manufacturer"  => 0,
            "manufacturer"        => '',
            "type"                => ($request->get('chk_return') ? Drug::RTS : Drug::DISPENSE),
            "date_in"             => $request->get("date_dispensed"),
        ]);

        $drug->drugMovements()->save($drug_movements);
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
            "pharmacist_id"       => $request->get('pharmacist'),
            "dea_no"              => '',
            "rx_no"               => '',
            "invoice_no"          => '',
            "quantity"            => $request->get('quantity'),
            "other_manufacturer"  => 0,
            "manufacturer"        => '',
            "type"                => $request->get('log_type'),
            "date_in"             => $request->get("date_dispensed"),
        ]);

        $drug->drugMovements()->save($drug_movements);
        $drug->save();
        return response()->json(['success' => true, 'message' => 'Loggig successful!']);
    }
}
