<?php


namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }
    public function _getProfile()
    {
        return view('dashboard.profile-edit');
    }
    public function _updateYourAvatar(Request $request)
    {
        $filename = time() . '.' . request()->file->getClientOriginalExtension();
        request()->file->move(public_path('image'), $filename);
        $user = User::find(get_current_user_id());
        $user->logo = $filename;
        $user->save();
        return $this->sendJson([
            'status' => 1,
            'message' => view('Common.alert', ['message' => __('backend.File Uploaded successfully'), 'type' => 'success'])->render(),
           
        ]);
    }
    public function _updateYourProfile(Request $request)
    {   
        $name = request()->get('name');
        $phone = request()->get('phone');
        $email= request()->get('email');
        $description = request()->get('description');
        $user = User::find(get_current_user_id());
        $user->name=$name;
        $user->phone=$phone;
        $user->email=$email;
        $user->description=$description;
        $user->save();
        return $this->sendJson([
            'status' => 1,
            'message' => view('Common.alert', ['message' => __('backend.Profile Updated successfully'), 'type' => 'success'])->render(),
           
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
