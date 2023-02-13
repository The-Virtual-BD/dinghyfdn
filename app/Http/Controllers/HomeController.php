<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDonationRequest;
use App\Mail\DonationMail;
use App\Mail\SubscriptionMail;
use App\Models\CaseStudy;
use App\Models\Category;
use App\Models\Donation;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Research;
use App\Models\Setting;
use App\Models\Subscriber;
use App\Models\Survey;
use App\Models\Team;
use Illuminate\Support\Facades\Mail;
use Yajra\Datatables\Datatables;

class HomeController extends Controller
{
    public function home()
    {
        $projects = Project::with('category')->where('status','active')->latest()->take(3)->get();
        $events = Event::latest()->take(2)->get();
        $gallery = Gallery::where('topic', 'Home')->first();
        $gallery->getMedia();
        $donation = Setting::where('property', 'donation')->first();

        $mastertarget = Setting::where('property', 'donattarget')->first();
        $masterraised= Setting::where('property', 'donatraised')->first();

        return view('index', compact('projects', 'events', 'gallery', 'donation','mastertarget','masterraised'));
    }


    // Getting active Proects on donation from
    public function getactiveProjects(Request $request)
    {
        $projects =  Project::where('status', 'active')->get();
        return response()->json(['status' => 'success', 'data' => $projects]);
    }

    // Making donation
    public function donate(StoreDonationRequest $request)
    {
        $donation = new Donation();
        $donation->donation_ammount = $request->dammount;
        $donation->donation_method = $request->pmethod;
        $donation->donation_type = $request->donation_type;
        if ($request->project) {
            $donation->project_id  = $request->project;
        }
        $donation->donar_firstname = $request->dofirstname;
        $donation->donar_lasttname = $request->dolastname;
        $donation->donar_email = $request->doemail;
        $donation->phone = $request->dophone;
        $donation->address = $request->doaddress;
        $donation->save();

        $msg = Setting::where('property', 'donationtxt')->first()->value;

        try {
            $sendmail =    Mail::to($donation->donar_email)->send(new DonationMail($msg,$donation));
        } catch (\Exception $exception) {
        }

        return response()->json(['status' => 'success', 'message' => 'Donated Successfully! Thanks.']);
    }

    // Subscribing user
    public function subscribe(Request $request)
    {
        $exist = Subscriber::where('email', $request->email)->get();
        if ($exist->count() > 0) {
            return response()->json(['status' => 'error', 'message' => 'Email already subscribed !']);
        }

        $subscribe = Subscriber::create(['email' => $request->email]);
        if ($subscribe) {
            $msg = Setting::where('property', 'newslettertxt')->first()->value;
            try {
                Mail::to($subscribe->email)->send(new SubscriptionMail($msg));
            } catch (\Exception $exception) {
            }
            return response()->json(['status' => 'success', 'message' => 'Welcome! Subscribed successfully !']);
        }
    }



    // Researches page
    public function researches(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of( Research::all())->addIndexColumn()->make(true);
        }
        return view('researches');
    }






    // Cases page
    public function cases(Request $request){
        if ($request->ajax()) {
            return Datatables::of( CaseStudy::all())->addIndexColumn()->make(true);
        }
        return view('cases');
    }
    // Surveys page
    public function surveys(Request $request){
        if ($request->ajax()) {
            return Datatables::of( Survey::all())->addIndexColumn()->make(true);
        }
        return view('surveys');
    }


    public function galleries()
    {
        $galleries = Gallery::all();
        foreach ($galleries as $gallery) {
            $gallery->getMedia();
        }
        // return $galleries;
        return view('gallery', compact('galleries'));
    }

    public function gallerydetails(Gallery $gallery)
    {
        $galleries = Gallery::all();
        $gallery->getMedia();
        return view('gallerydetails', compact('gallery','galleries'));
    }


    public function events()
    {
        $events = Event::with('category')->get();
        return view('events', compact('events'));
    }

    public function eventsdetails(Event $event)
    {
        $event = Event::with('category')->find($event->id);
        $event->getMedia();
        $relatedevent = Event::with('category')->where('id', '!=', $event->id)->first();
        return view('eventdetails', compact('event', 'relatedevent'));
    }


    public function projects()
    {
        $projects = Project::with('category')->where('status','active')->get();
        return view('projects', compact('projects'));
    }

    
    public function projectDetails(Project $project)
    {
        $project = Project::with('category')->find($project->id);
        $project->getMedia();

        return view('project', compact('project'));
    }

    // Become Volunteer
    public function volunteer()
    {
        return view('volunteer');
    }

    // Team Page
    public function teams()
    {
        $founders = Team::where('type', 1)->get();
        $administators = Team::where('type', 2)->get();
        $volunteers = Team::where('type', 3)->get();
        return view('team', compact('founders', 'administators', 'volunteers'));
    }
}
