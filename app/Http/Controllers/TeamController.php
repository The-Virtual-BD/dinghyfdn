<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;


class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $founders = Team::where('type',1)->get();
        $administators = Team::where('type',2)->get();
        $volunteers = Team::where('type',3)->get();


        return view('dashboard.teams.index', compact('founders','administators','volunteers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.teams.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTeamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamRequest $request)
    {

        $teammember = new Team();
        $teammember->name = $request->name;
        $teammember->designation = $request->designation;
        $teammember->type = $request->type;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filefullname = time().'.'.$file->getClientOriginalExtension();
            $upload_path = 'img/uploads/teammember/';
            $fileurl = $upload_path.$filefullname;
            $success = $file->move($upload_path, $filefullname);
            $teammember->photo = $fileurl;
        }
        $teammember->save();


        return Redirect::route('teams.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('dashboard.teams.edit',compact('team'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTeamRequest  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->type = $request->type;

        if ($request->file('photo')) {
            File::delete($team->photo);
            $file = $request->file('photo');
            $filefullname = time().'.'.$file->getClientOriginalExtension();
            $upload_path = 'img/uploads/teammember/';
            $fileurl = $upload_path.$filefullname;
            $success = $file->move($upload_path, $filefullname);
            $team->photo = $fileurl;
        }
        $team->save();


        return Redirect::route('teams.edit',$team->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        File::delete($team->photo);
        $team->delete();
        return Redirect::route('teams.index')->with('status', 'member-deleted');

    }
}
