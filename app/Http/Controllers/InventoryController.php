<?php

namespace App\Http\Controllers;

use App\Drug;
use App\DrugMovement;
use App\Http\Requests\CreateDrugRequest;
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

        return view('inventory.log-drug', compact('pharmacists'));
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
        return response()->json(['success' => true, 'message' => 'done']);
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
        return response()->json(['success' => true, 'message' => 'done']);
    }
}
