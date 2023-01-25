<?php

namespace App\Http\Controllers;

use App\Models\VolunteerApplication;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\StoreVolunteerApplicationRequest;
use App\Http\Requests\UpdateVolunteerApplicationRequest;
use App\Mail\VolunteerMail;
use App\Models\Setting;
use App\Models\Team;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class VolunteerApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of( VolunteerApplication::all())->addIndexColumn()->make(true);
        }
        return view('dashboard.vapplications.index');
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
     * @param  \App\Http\Requests\StoreVolunteerApplicationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVolunteerApplicationRequest $request)
    {

        $va = new VolunteerApplication();
        $va->name = $request->vafirstname;
        $va->email = $request->vaemail;
        $va->phone = $request->vaphone;
        $va->address = $request->vaaddress;

        if ($request->file('vaphoto')) {
            $file = $request->file('vaphoto');
            $filefullname = time().'.'.$file->getClientOriginalExtension();
            $upload_path = 'img/uploads/vapplications/';
            $fileurl = $upload_path.$filefullname;
            $success = $file->move($upload_path, $filefullname);
            $va->photo = $fileurl;
        }

        if ($request->file('vacv')) {
            $file = $request->file('vacv');
            $filefullname = time().'.'.$file->getClientOriginalExtension();
            $upload_path = 'img/uploads/vapplications/cv/';
            $fileurl = $upload_path.$filefullname;
            $success = $file->move($upload_path, $filefullname);
            $va->cv = $fileurl;
        }
        $va->save();


        $msg = Setting::where('property', 'vapptxt')->first()->value;

        try {
            $sendmail =    Mail::to($va->email)->send(new VolunteerMail($msg));
        } catch (\Exception $exception) {
        }

        return response()->json(['status' => 'success', 'message' => 'Applied successfully ! We will contact with you soon.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VolunteerApplication  $volunteerApplication
     * @return \Illuminate\Http\Response
     */
    public function show(VolunteerApplication $volunteerApplication)
    {
        return view('dashboard.vapplications.show',compact('volunteerApplication'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VolunteerApplication  $volunteerApplication
     * @return \Illuminate\Http\Response
     */
    public function edit(VolunteerApplication $volunteerApplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVolunteerApplicationRequest  $request
     * @param  \App\Models\VolunteerApplication  $volunteerApplication
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVolunteerApplicationRequest $request, VolunteerApplication $volunteerApplication)
    {
        if ($request->statuschange) {
            if ($request->statuschange == 2) {
                $teammember = new Team();
                $teammember->name = $volunteerApplication->name;
                $teammember->email = $volunteerApplication->email;
                $teammember->phone = $volunteerApplication->phone;
                $teammember->address = $volunteerApplication->address;
                if ($volunteerApplication->vd) {
                    # code...
                    $teammember->cv = $volunteerApplication->cv;
                }
                $teammember->designation = 'Volunteer';
                $teammember->type = 3;
                $teammember->photo = $volunteerApplication->photo;
                $teammember->save();


                $volunteerApplication->delete();

                return redirect()->route('teams.index');
            }


            $volunteerApplication->status = $request ->statuschange;
            $volunteerApplication->update();
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VolunteerApplication  $volunteerApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $volunteerApplication = VolunteerApplication::find($id);

        if ($volunteerApplication->status != 2 && $volunteerApplication->cv) {
            File::delete($volunteerApplication->cv);
        }
        if ($volunteerApplication->status != 2) {
            File::delete($volunteerApplication->photo);
        }
        $volunteerApplication->delete();

        return redirect()->route('volunteerApplications.index');
    }
}
