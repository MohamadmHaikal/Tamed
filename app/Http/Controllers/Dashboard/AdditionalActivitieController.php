<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Activitie;
use App\Models\AdditionalActivitie;
use Illuminate\Http\Request;

class AdditionalActivitieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $activities = AdditionalActivitie::all();
        return view('dashboard.AdditionalActivitie.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $mainActivitys = Activitie::all();
        return view('dashboard.AdditionalActivitie.create', compact('mainActivitys'));
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
        $activitie = new AdditionalActivitie;
        $activitie->name = $request->name;
        $activitie->activitie_id = $request->main_id;
        $activitie->save();
        return redirect()->route('additionalactivitie.all');
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
        $activitie = AdditionalActivitie::find($id);
        return view('dashboard.AdditionalActivitie.show', compact('activitie'));
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
        $activitie = AdditionalActivitie::find($id);
        $mainActivitys = Activitie::all();
        return view('dashboard.AdditionalActivitie.edit', compact('activitie', 'mainActivitys'));
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
        $activitie = AdditionalActivitie::find($id);
        $activitie->name = $request->name;
        $activitie->activitie_id = $request->main_id;
        $activitie->save();
        return redirect()->route('additionalactivitie.all');
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
        $activitie = AdditionalActivitie::find($id);
        $activitie->delete();
        return redirect()->back();
    }
}
