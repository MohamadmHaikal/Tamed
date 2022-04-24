<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\ElectronicContracts;
use App\Models\invoice;
use App\Models\UserType;
use Illuminate\Http\Request;

class ElectronicContractsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Contracts = ElectronicContracts::where('user_id', '=', get_current_user_id())->get();
        return view('ElectronicContracts.index', compact('Contracts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $types = UserType::all();
        return view('ElectronicContracts.create', compact('cities', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Contract = new ElectronicContracts;
        $Contract->type_id = $request->type_id;
        $Contract->CRecord = $request->CRecord;
        $Contract->company_name = $request->company_name;
        $Contract->contract_number = $request->contract_number;
        $Contract->Brief_description = $request->Brief_description;
        $Contract->contract_date = $request->contract_date;
        $Contract->date_start = $request->date_start;
        $Contract->date_end = $request->date_end;
        $Contract->renewable = $request->renewable;
        $Contract->amount = $request->amount;
        $Contract->user_id = get_current_user_id();
        $Contract->first_batch = $request->first_batch;
        $Contract->second_batch = $request->second_batch;
        $Contract->third_batch = $request->third_batch;
        $Contract->final_batch = $request->final_batch;
        $Contract->city_id = $request->city_id;
        $Contract->description = $request->description;
        $this->fileUpload($request->file('Contract_file'), 'ElectronicContracts', $Contract->id);
        $Contract->Contract_file = '22';
        $Contract->save();
        return redirect()->route('ElectronicContracts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Contract = ElectronicContracts::find($id);
        $Contract['type'] = $Contract->UserType->name;
        $Contract['City'] = $Contract->City->name;
        return $Contract;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    public function _getInvoice($id)
    {
        return invoice::where('contracts_id', '=', $id)->get();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
