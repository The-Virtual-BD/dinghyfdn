<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreCaseStudyRequest;
use App\Http\Requests\UpdateCaseStudyRequest;

class CaseStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        if ($request->ajax()) {
            return Datatables::of( CaseStudy::all())->addIndexColumn()->make(true);
        }
        return view('dashboard.casestudies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.casestudies.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCaseStudyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCaseStudyRequest $request)
    {
        $casestudy = new CaseStudy();
        $casestudy->number = $request->number;
        $casestudy->subject = $request->subject;
        $casestudy->supervisor = $request->supervisors;
        $casestudy->publish_date = $request->date;
        $casestudy->link = $request->link;

        if ($request->file('file')) {
            $file = $request->file('file');
            $filefullname = time().'_'.$casestudy->number.'.'.$file->getClientOriginalExtension();
            $upload_path = 'img/uploads/casestudies/';
            $fileurl = $upload_path.$filefullname;
            $success = $file->move($upload_path, $filefullname);
            $casestudy->file = $fileurl;
        }
        $casestudy->save();


        return redirect()->route('casestudies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function show(CaseStudy $caseStudy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function edit(CaseStudy $casestudy)
    {
        return view('dashboard.casestudies.edit',compact('casestudy'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCaseStudyRequest  $request
     * @param  \App\Models\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCaseStudyRequest $request, CaseStudy $casestudy)
    {
        $casestudy->number = $request->number;
        $casestudy->subject = $request->subject;
        $casestudy->supervisor = $request->supervisors;
        $casestudy->publish_date = $request->date;
        $casestudy->link = $request->link;

        if ($request->file('file')) {
            File::delete($casestudy->file);
            $file = $request->file('file');
            $filefullname = time().'_'.$casestudy->number.'.'.$file->getClientOriginalExtension();
            $upload_path = 'img/uploads/casestudies/';
            $fileurl = $upload_path.$filefullname;
            $success = $file->move($upload_path, $filefullname);
            $casestudy->file = $fileurl;
        }
        $casestudy->update();

        return redirect()->route('casestudies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $casestudy = CaseStudy::find($id);
        if ($casestudy->file) {
            File::delete($casestudy->file);
        }
        $casestudy->delete();
        return response()->json(['status' => 'success', 'message' => 'Case Study deleted successfylly !']);
    }
}
