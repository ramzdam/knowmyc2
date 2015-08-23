<?php

namespace App\Http\Controllers;

use App\Distributor;
use App\DrugMovement;
use App\Http\Requests\CreateDistributorRequest;
use App\InventoryDrug;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $distributors = Distributor::where('pharmacy_id', Session::get('data.pharmacy')->id)->get();

        return view('distributor.index', compact('distributors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $distributors = array(
            Distributor::WHOLESALER_PRIMARY => "Wholesaler Primary",
            Distributor::WHOLESALER_OTHER => "Wholesaler Others",
            Distributor::PHARMACY => "Pharmacy",
            Distributor::OTHERS => "Others",
        );

        return view('distributor.create', compact('distributors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CreateDistributorRequest $request)
    {
        $pharmacy = Distributor::create([
            "name" => $request->get('name'),
            "pharmacy_id" => Session::get('data.pharmacy')->id,
            "type" => $request->get('type'),
            "contact" => $request->get('contact'),
            "address" => $request->get('address'),
            "city" => $request->get('city'),
            "state" => $request->get('state'),
            "zipcode" => $request->get('zipcode'),
            "npi" => $request->get('npi'),
            "dea" => $request->get('dea'),
            "rep" => $request->get('rep'),
            "note" => $request->get('note'),
            "created_at" => $request->get('date_added'),
        ]);

        $pharmacy->save();

        return response()->json(['success' => true, 'message' => 'Pharmacy distributor has been added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $details = Distributor::find($id);

        return view('distributor.details', compact('details'));
    }

    /**
     * Show the transction view for the current distributor
     *
     * @param int $transaction_id
     * @return Response
     */
    public function transaction($transaction_id)
    {
        $distributor = Distributor::find($transaction_id);
        $logs = InventoryDrug::with('distributor')->where('distributor_id', $transaction_id)->get();
//dd($logs);
        return view('distributor.transaction_logs', compact('logs', 'distributor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $distributors = array(
            Distributor::WHOLESALER_PRIMARY => Distributor::S_WHOLESALER_PRIMARY,
            Distributor::WHOLESALER_OTHER => Distributor::S_WHOLESALER_OTHER,
            Distributor::PHARMACY => Distributor::S_PHARMACY,
            Distributor::OTHERS => Distributor::S_OTHERS,
        );

//        $distributors = array(
//            Distributor::S_WHOLESALER_PRIMARY => Distributor::WHOLESALER_PRIMARY,
//            Distributor::S_WHOLESALER_OTHER => Distributor::WHOLESALER_OTHER,
//            Distributor::S_PHARMACY => Distributor::PHARMACY,
//            Distributor::S_OTHERS => Distributor::OTHERS,
//        );

        $details = Distributor::find($id);


        return view('distributor.create', compact('distributors', 'details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(CreateDistributorRequest $request, $id)
    {
        $distributor_details = Distributor::findOrFail($id);
        $distributor_details->update($request->all());

        $distributors = Distributor::where('pharmacy_id', Session::get('data.pharmacy')->id)->get();

        return response()->json(['success' => true, 'message' => 'Pharmacy distributor has been added', 'redirect' => 'distributor']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function test() {
        return response()->json(['success' => true, 'message' => 'Pharmacy distributor has been added']);
    }
}
