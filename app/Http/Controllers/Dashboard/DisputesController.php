<?php


namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class DisputesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($filter = '')
    {
        $reports = null;
        if (is_admin()) {
            if ($filter) {
                $reports = Report::where('status', '=', $filter)->get();
            } else {
                $reports = Report::all();
            }
        } else {
            if ($filter) {
                $reports = Report::where('applicant_id', get_current_user_id())
                    ->orWhere('against_id', get_current_user_id())
                    ->where('status', '=', $filter)
                    ->get();
            } else {
                $reports = Report::where('applicant_id', get_current_user_id())
                    ->orWhere('against_id', get_current_user_id())
                    ->get();
            }
        }

        return view('Disputes.index', compact('reports', 'filter'));
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
        $report = Report::find($id);
        return view('Disputes.show', compact('report'));
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
