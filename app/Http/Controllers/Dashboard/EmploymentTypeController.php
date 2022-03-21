<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeEmployment;

class EmploymentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($model)
    { 
        $modelName = 'App\\Models\\' .$model;
        $model = new $modelName();
        $Item = $model->all();
        return view('addItem.Item.index',  compact('Item')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addItem.employmentType.create'); 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        
        $this->sendJson([
            'status' => 0,
            'message' => view('Common.alert', ['message' => __('backend.All fields is required'), 'type' => 'danger'])->render(),
        ], true);
        $this->sendJson([
            'status' => 0,
            'title' => __('System Alert'),
            'message' => __('The home is not exist')
        ], true);

        dd($request);
        $Emp = new TypeEmployment;
        $Emp->quantity = $request->quantity;
        $Emp->employee_id = $request->employee_id;
        $Emp->quote_id = $request->quote_id;
      
        $Emp->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd(1111);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd(2222);
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
  

    
}
