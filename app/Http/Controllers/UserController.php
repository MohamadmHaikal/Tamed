<?php

namespace App\Http\Controllers;

use App\Models\Activitie;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($filter = '')
    {
        $users = null;
        if ($filter) {
            $activity = get_activity_id_by_user_type($filter);
            $array = [];
            foreach ($activity as $a) {

                array_push($array, $a['id']);
            }

            $users = User::whereIn('activitie_id', $array)->get();
        } else {
            $users = User::all();
        }
        return view('Users.all-Users', compact('users'));
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
        $user = new User;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = '';
        $user->activitie_id = $request->activitie_id;
        $user->save();
        return $this->sendJson([
            'status' => 1,
            'message' => view('Common.alert', ['message' => __('backend.user added successfully'), 'type' => 'success'])->render(),
            'reload' => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $user['allType'] = UserType::all();
        $user['userType'] = get_facility_type($user->activitie_id)->name;
        $user['userActivity'] = Activitie::find($user->activitie_id)->name;
        $user['allActivity'] = Activitie::all();
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $user = User::find($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->activitie_id = $request->activitie_id;
        $user->save();
        return $this->sendJson([
            'status' => 1,
            'message' => view('Common.alert', ['message' => __('backend.Profile Updated successfully'), 'type' => 'success'])->render(),
            'reload' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return $this->sendJson([
            'status' => 1,
            'reload' => true,
        ]);
    }
}
