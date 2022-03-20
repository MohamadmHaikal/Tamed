<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function sendJson($data, $withDie = false)
    {
        if ($withDie) {
            echo json_encode($data);
            die;
        } else {
            return response()->json($data);
        }
    }

    public function _deleteItem(Request $request)
    {
        $modelName = 'App\\Models\\' .$request->model;
        $model = new $modelName();
        $arrayItem = $model->where('id',$request->ID)->delete();

       return $this->sendJson([
            'status' => 0,
            'reload' => true,
            'message' => view('Common.alert', ['message' => __('backend.All fields is required'), 'type' => 'danger'])->render(),
        ], true);
    }

    public function _addItem(Request $request)
    {

        $modelName = 'App\\Models\\' .$request->model;
        $model = new $modelName();
        $arrayItem = $model->create($request->all());

       return $this->sendJson([
            'status' => 0,
            'reload' => true,
            'message' => view('Common.alert', ['message' => __('backend.All fields is required'), 'type' => 'danger'])->render(),
        ], true);
    }

    public function _getItem(Request $request)
    {
    
        $modelName = 'App\\Models\\' .$request->model;
        $Newmodel = new $modelName();
        $arrayItem = $Newmodel->getColumn( $request->ID);
  
       return $this->sendJson([
           'title' =>  __('backend.edit'),
           'type' =>   $request->type,
           'action' => ( $request->type == 'edit') ? route('update-item') : '' ,
           'model' => $request->model ,
           'arrayItem' => $arrayItem ,
        ], true);
    }

    public function _updateItem(Request $request)
    {
  
        $modelName = 'App\\Models\\' .$request->model;
        $model = new $modelName();
        $input = $request->all();
        $arrayItem = $model->findOrFail($request->id)->fill($input)->save();
        return $this->sendJson([
            'status' => 0,
            'reload' => true,
            'message' => view('Common.alert', ['message' => __('backend.All fields is required'), 'type' => 'danger'])->render(),
        ], true);
    }

}
