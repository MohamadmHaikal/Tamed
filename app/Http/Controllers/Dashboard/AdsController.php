<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeEmployment;
use App\Models\TypeAds;
use App\Models\Ads;
use App\Models\File;
use App\Models\AdditionalActivitie;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getType($type,$id='')
    {
        
            $x = TypeAds::getTypeName($type);
            if ($id != '') {
            $item = Ads::find($id);
                $itemValue= unserialize($item->infoArray);
                return view('addItem.Ads.inputsAds',compact('x','type','itemValue','item') )->render();
            }
           
       return view('addItem.Ads.inputsAds',compact('x','type') )->render();
     
    }

    public function getAddActivity($activity)
    {
        $item =AdditionalActivitie::where('activitie_id',$activity)->get();
        return $item;    
    }

    public function deleteFile($id)
    {
        File::where('id',$id)->delete(); 
    }


    public function index()
    {

        $Ads=Ads::all();
        return view('addItem.Ads.index',compact('Ads')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('addItem.Ads.create'); 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $x = TypeAds::getTypeName($request->model);
        $infoArray=[];
        foreach ($x[0] as $key => $value) {
         if ($request->exists($value['name'])) {
             $infoArray += [$value['name'] => $request->get($value['name']) ];
         }
        }
        $infoArray +=['model' => $request->model];
        $item=Ads::create(array_merge($request->all(), ['infoArray' => serialize ($infoArray) ]));

        foreach ($request->file() as $key => $v) {
            foreach ($request->file($key) as $key => $value) {
                $this->fileUpload($value,'Ads', $item->id );
            }
        }

        $this->sendJson([
            'status' => 0,
            'message' => view('Common.alert', ['message' => __('backend.All fields is required'), 'type' => 'danger'])->render(),
        ], true);
        $this->sendJson([
            'status' => 0,
            'title' => __('System Alert'),
            'message' => __('The home is not exist')
        ], true);


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
        $data['item'] = Ads::with('activity','File')->find($id);
        return isset($data['item']) ? view('addItem.Ads.create', $data) : redirect()->back();

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
        dd(5);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    
}
