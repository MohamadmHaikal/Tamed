<?php


namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DisputesMessage;
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
        $message = DisputesMessage::where('reports_id', '=', $id)->get();
        return view('Disputes.show', compact('report', 'message'));
    }
    public function close_dispute($id)
    {
        $report = Report::find($id);
        $report->status = 'closed';
        $report->save();
        return $this->sendJson([
            'status' => 1,
            'message' => view('Common.alert', ['message' => __('backend.Complaint closed successfully'), 'type' => 'success'])->render(),
            'reload' => true,
        ]);
    }
    public function addComent(Request $request, $id)
    {
        $message = new DisputesMessage;
        $message->user_id = get_current_user_id();
        $message->message = $request->message;
        $message->reports_id = $id;

        if (request()->file()) {
            $filename = time() . '.' . request()->file->getClientOriginalExtension();
            request()->file->move(public_path('image'), $filename);
            $message->image = $filename;
        }
        $message->save();
        $message->date = date('Y-m-d', strtotime($message->created_at));
        $message->user_id = get_user_by_id($message->user_id)->name;
        $message['status'] = view('Common.alert', ['message' => __('backend.message added successfully'), 'type' => 'success'])->render();
        return $message;
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
