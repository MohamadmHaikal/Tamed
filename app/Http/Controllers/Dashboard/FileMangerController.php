<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\File;

class FileMangerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $files = File::orderBy('id', 'DESC')->get();
        return View("apps.file-manager", compact('files'));
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
    public static function formatBytes($size, $precision = 2)
    {
        if ($size > 0) {
            $size = (int) $size;
            $base = log($size) / log(1024);
            $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');

            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        } else {
            return $size;
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $size = $request->file('file')->getSize();
        $size = $this->formatBytes($size, $precision = 2);
        $name = $request->file('file')->getClientOriginalName();
        $type = $request->file('file')->extension();
        $modal = ['owner' => get_current_user_id(), 'size' => $size, 'type' => $type];
        $modal = serialize($modal);
        $filename = time() . '.' . request()->file->getClientOriginalExtension();
        request()->file->move(public_path('image'), $filename);
        $file = new File;
        $file->name = $name;
        $file->modal = $modal;
        $file->file = $filename;
        $file->save();
        return $this->sendJson([
            'status' => 1,
            'message' => view('Common.alert', ['message' => __('backend.File Uploaded successfully'), 'type' => 'success'])->render(),
            'reload' => true,
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
        $file=File::find($id);
        $file->delete();
        return $this->sendJson([
            'status' => 1,
            'reload' => true,
        ]);
    }
}
