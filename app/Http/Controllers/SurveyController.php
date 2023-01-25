<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\StoreSurveyRequest;
use App\Http\Requests\UpdateSurveyRequest;
use Illuminate\Support\Facades\File;


class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        if ($request->ajax()) {
            return Datatables::of( Survey::all())->addIndexColumn()->make(true);
        }
        return view('dashboard.surveys.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.surveys.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSurveyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSurveyRequest $request)
    {
        $survey = new Survey();
        $survey->number = $request->number;
        $survey->subject = $request->subject;
        $survey->supervisor = $request->supervisors;
        $survey->publish_date = $request->date;
        $survey->link = $request->link;

        if ($request->file('file')) {
            $file = $request->file('file');
            $filefullname = time().'_'.$survey->number.'.'.$file->getClientOriginalExtension();
            $upload_path = 'img/uploads/surveys/';
            $fileurl = $upload_path.$filefullname;
            $success = $file->move($upload_path, $filefullname);
            $survey->file = $fileurl;
        }
        $survey->save();


        return redirect()->route('surveys.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function show(Survey $survey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function edit(Survey $survey)
    {
        return view('dashboard.surveys.edit',compact('survey'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSurveyRequest  $request
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSurveyRequest $request, Survey $survey)
    {
        $survey->number = $request->number;
        $survey->subject = $request->subject;
        $survey->supervisor = $request->supervisors;
        $survey->publish_date = $request->date;
        $survey->link = $request->link;

        if ($request->file('file')) {
            File::delete($survey->file);
            $file = $request->file('file');
            $filefullname = time().'_'.$survey->number.'.'.$file->getClientOriginalExtension();
            $upload_path = 'img/uploads/surveys/';
            $fileurl = $upload_path.$filefullname;
            $success = $file->move($upload_path, $filefullname);
            $survey->file = $fileurl;
        }
        $survey->update();


        return redirect()->route('surveys.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $survey = Survey::find($id);
        if ($survey->file) {
            File::delete($survey->file);
        }
        $survey->delete();
        return response()->json(['status' => 'success', 'message' => 'Survey deleted successfylly !']);
    }
}
