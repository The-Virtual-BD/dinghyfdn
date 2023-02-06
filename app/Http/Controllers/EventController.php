<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Category;
use App\Models\TemporaryFile;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of( Event::all())->addIndexColumn()->make(true);
        }
        return view('dashboard.events.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status','active')->get();
        return view('dashboard.events.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        $event = new Event();
        $event->title = $request->title;
        $event->short_title = $request->short_title;
        $event->time_one = $request->time_one;
        if ($request->time_two) {
            $event->time_two = $request->time_two;
        }
        $event->date_one = $request->date_one;
        if ($request->date_two) {
            $event->date_two = $request->date_two;
        }
        $event->category_id = $request->category_id;
        $event->status = $request->status;


        $event->address_line_one = $request->address_line_one;
        if ($request->address_line_two) {
            $event->address_line_two = $request->address_line_two;
        }
        if ($request->address_line_three) {
            $event->address_line_three = $request->address_line_three;
        }

        $event->organizer_name = $request->organizer_name;

        if ($request->organizer_phone) {
            $event->organizer_phone = $request->organizer_phone;
        }
        if ($request->organizer_link) {
            $event->organizer_weblink = $request->organizer_link;
        }
        $event->body = $request->body;

        if ($request->file('cover')) {
            $file = $request->file('cover');
            $filefullname = time().'.'.$file->getClientOriginalExtension();
            $upload_path = 'img/uploads/events/';
            $fileurl = $upload_path.$filefullname;
            $success = $file->move($upload_path, $filefullname);
            $event->cover = $fileurl;
        }

        if ($request->file('thumbnail')) {
            $file = $request->file('thumbnail');
            $filefullname = time().'.'.$file->getClientOriginalExtension();
            $upload_path = 'img/uploads/events/thumbnail/';
            $fileurl = $upload_path.$filefullname;
            $success = $file->move($upload_path, $filefullname);
            $event->thumbnail = $fileurl;
        }

        $event->save();


        if ($request->image) {
            foreach ($request->image as $image) {
                $tempfile = TemporaryFile::where('folder', $image)->first();
                if ($tempfile) {
                    $event->addMedia(storage_path('app/images/tmp/' . $image . '/' . $tempfile->filename))
                        ->toMediaCollection('images');
                    rmdir(storage_path('app/images/tmp/' . $image));
                    $tempfile->delete();
                }
            }
        }

        return redirect()->route('events.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        if ($event->status == '1') {
            $event->status = '2';
        }else {
            $event->status = '1';
        }
        $event->update();
        return redirect()->route('events.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $categories = Category::where('status','active')->get();
        $event = Event::with('category')->find($event->id);
        $event->getMedia();
        return view('dashboard.events.edit',compact('categories','event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->title = $request->title;
        $event->short_title = $request->short_title;
        $event->time_one = $request->time_one;
        if ($request->time_two) {
            $event->time_two = $request->time_two;
        }
        $event->date_one = $request->date_one;
        if ($request->date_two) {
            $event->date_two = $request->date_two;
        }
        $event->category_id = $request->category_id;
        $event->status = $request->status;


        $event->address_line_one = $request->address_line_one;
        if ($request->address_line_two) {
            $event->address_line_two = $request->address_line_two;
        }
        if ($request->address_line_three) {
            $event->address_line_three = $request->address_line_three;
        }

        $event->organizer_name = $request->organizer_name;

        if ($request->organizer_phone) {
            $event->organizer_phone = $request->organizer_phone;
        }
        if ($request->organizer_link) {
            $event->organizer_weblink = $request->organizer_link;
        }
        $event->body = $request->body;

        if ($request->file('cover')) {
            // Delete old cover
            if($event->cover) {
                unlink($event->cover);
            }
            $file = $request->file('cover');
            $filefullname = time().'.'.$file->getClientOriginalExtension();
            $upload_path = 'img/uploads/events/';
            $fileurl = $upload_path.$filefullname;
            $success = $file->move($upload_path, $filefullname);
            $event->cover = $fileurl;
        }

        if ($request->file('thumbnail')) {
            // Delete old thumbnail
            if($event->thumbnail) {
                unlink($event->thumbnail);
            }
            $file = $request->file('thumbnail');
            $filefullname = time().'.'.$file->getClientOriginalExtension();
            $upload_path = 'img/uploads/events/thumbnail/';
            $fileurl = $upload_path.$filefullname;
            $success = $file->move($upload_path, $filefullname);
            $event->thumbnail = $fileurl;
        }

        $event->update();


        if ($request->image) {
            foreach ($request->image as $image) {
                $tempfile = TemporaryFile::where('folder', $image)->first();
                if ($tempfile) {
                    $event->addMedia(storage_path('app/images/tmp/' . $image . '/' . $tempfile->filename))
                        ->toMediaCollection('images');
                    rmdir(storage_path('app/images/tmp/' . $image));
                    $tempfile->delete();
                }
            }
        }


        return redirect()->route('events.edit',$event->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        if($event->cover) {
            unlink($event->cover);
        }
        if($event->thumbnail) {
            unlink($event->thumbnail);
        }
        $event->delete();
        return response()->json(['status' => 'success', 'message' => 'Event deleted successfylly !']);
    }
}
