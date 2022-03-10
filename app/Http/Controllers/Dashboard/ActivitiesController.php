<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Activitie;
use App\Models\UserType;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activitie::all();
        return view('dashboard.Activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $userType = UserType::all();
        return view('dashboard.Activities.create', compact('userType'));
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
        $activitie = new Activitie;
        $activitie->activity = $request->name;
        $activitie->type_id = $request->type_id;
        $activitie->save();
        return redirect()->route('activites.all');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $activitie = Activitie::find($id);
        return view('dashboard.Activities.show', compact('activitie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activitie = Activitie::find($id);
        $userType = UserType::all();
        return view('dashboard.Activities.edit', compact('activitie', 'userType'));
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
        $activitie = Activitie::find($id);
        $activitie->activity = $request->name;
        $activitie->type_id = $request->type_id;
        $activitie->save();
        return redirect()->route('activites.all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activitie = Activitie::find($id);
        $activitie->delete();
        return redirect()->back();
    }
}
