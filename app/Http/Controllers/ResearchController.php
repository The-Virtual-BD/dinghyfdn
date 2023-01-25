<?php

namespace App\Http\Controllers;

use App\Models\Research;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\StoreResearchRequest;
use App\Http\Requests\UpdateResearchRequest;
use Illuminate\Support\Facades\File;


class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        if ($request->ajax()) {
            return Datatables::of( Research::all())->addIndexColumn()->make(true);
        }
        return view('dashboard.researches.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.researches.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreResearchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResearchRequest $request)
    {
        $research = new Research();
        $research->number = $request->number;
        $research->subject = $request->subject;
        $research->supervisor = $request->supervisors;
        $research->publish_date = $request->date;
        $research->link = $request->link;

        if ($request->file('file')) {
            $file = $request->file('file');
            $filefullname = time().'_'.$research->number.'.'.$file->getClientOriginalExtension();
            $upload_path = 'img/uploads/researches/';
            $fileurl = $upload_path.$filefullname;
            $success = $file->move($upload_path, $filefullname);
            $research->file = $fileurl;
        }
        $research->save();


        return redirect()->route('researches.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function show(Research $research)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function edit(Research $research)
    {
        return view('dashboard.researches.edit',compact('research'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResearchRequest  $request
     * @param  \App\Models\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResearchRequest $request, Research $research)
    {
        // return $request;

        $research->number = $request->number;
        $research->subject = $request->subject;
        $research->supervisor = $request->supervisors;
        $research->publish_date = $request->date;
        $research->link = $request->link;

        if ($request->file('file')) {
            File::delete($research->file);
            $file = $request->file('file');
            $filefullname = time().'_'.$research->number.'.'.$file->getClientOriginalExtension();
            $upload_path = 'img/uploads/researches/';
            $fileurl = $upload_path.$filefullname;
            $success = $file->move($upload_path, $filefullname);
            $research->file = $fileurl;
        }
        $research->update();


        return redirect()->route('researches.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $research = Research::find($id);
        if ($research->file) {
            File::delete($research->file);
        }
        $research->delete();
        return response()->json(['status' => 'success', 'message' => 'Research deleted successfylly !']);
    }
}
