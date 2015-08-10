<?php

namespace App\Http\Controllers;

use App\Drug;
use App\Http\Requests\CreateDrugRequest;
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
        return view('inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CreateDrugRequest $request)
    {

        $drug = Drug::create([
            "pharmacy_id" => Session::get('data.pharmacy')->id,
            "name" => $request->get('name'),
            "quantity" => $request->get('quantity'),
            "NDC" => $request->get('ndc'),
            "rx_no" => $request->get('rx_no'),
            "drug_schedule" => $request->get('drug_schedule'),
            "prescription" => $request->get('prescription'),
            "script_no" => $request->get('script_no'),

        ]);

        $drug->save();
//        Session::flash('flash_message', 'Registration Successful!');
        return array('success' => true, 'message' => 'Registration successful');
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
    public function destroy($id)
    {
        //
    }
}
