<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Category;
use Carbon\Carbon;
use App\Models\TemporaryFile;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of( Project::all())->addIndexColumn()->make(true);
        }
        return view('dashboard.projects.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status','active')->get();
        return view('dashboard.projects.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        // return $request;
        $project = new Project();
        $project->title = $request->title;
        $project->short_title = $request->short_title;
        if ($request->date) {
            $project->publish_date = $request->date;
        }else {
            $project->publish_date = Carbon::now();
        }
        $project->category_id = $request->category_id;
        $project->target_fund = $request->target_fund;
        $project->raised_fund = $request->raised_fund;
        $project->body = $request->body;

        if ($request->file('cover')) {
            $file = $request->file('cover');
            $filefullname = time().'.'.$file->getClientOriginalExtension();
            $upload_path = 'img/uploads/projects/';
            $fileurl = $upload_path.$filefullname;
            $success = $file->move($upload_path, $filefullname);
            $project->cover = $fileurl;
        }
        $project->save();


        if ($request->image) {
            foreach ($request->image as $image) {
                $tempfile = TemporaryFile::where('folder', $image)->first();
                if ($tempfile) {
                    $project->addMedia(storage_path('app/images/tmp/' . $image . '/' . $tempfile->filename))
                        ->toMediaCollection('images');
                    rmdir(storage_path('app/images/tmp/' . $image));
                    $tempfile->delete();
                }
            }
        }

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        if ($project->status == 'active') {
            $project->status = 'disabled';
        }else {
            $project->status = 'active';
        }
        $project->update();
        return redirect()->route('projects.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $categories = Category::where('status','active')->get();
        $project = Project::with('category')->find($project->id);
        $project->getMedia();
        return view('dashboard.projects.edit',compact('categories','project'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {

        $project->title = $request->title;
        $project->short_title = $request->short_title;
        if ($request->date) {
            $project->publish_date = $request->date;
        }
        $project->category_id = $request->category_id;
        $project->target_fund = $request->target_fund;
        $project->raised_fund = $request->raised_fund;
        $project->body = $request->body;

        if ($request->file('cover')) {
            // Delete old cover
            if($project->cover) {
                unlink($project->cover);
            }
            $file = $request->file('cover');
            $filefullname = time().'.'.$file->getClientOriginalExtension();
            $upload_path = 'img/uploads/projects/';
            $fileurl = $upload_path.$filefullname;
            $success = $file->move($upload_path, $filefullname);
            $project->cover = $fileurl;
        }
        $project->update();

        if ($request->image) {
            foreach ($request->image as $image) {
                $tempfile = TemporaryFile::where('folder', $image)->first();
                if ($tempfile) {
                    $project->addMedia(storage_path('app/images/tmp/' . $image . '/' . $tempfile->filename))
                        ->toMediaCollection('images');
                    rmdir(storage_path('app/images/tmp/' . $image));
                    $tempfile->delete();
                }
            }
        }

        return redirect()->route('projects.edit',$project->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        if($project->cover) {
            unlink($project->cover);
        }
        $project->delete();
        return response()->json(['status' => 'success', 'message' => 'Project deleted successfylly !']);
    }
}
