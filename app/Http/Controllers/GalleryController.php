<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Models\TemporaryFile;
use Illuminate\Support\Facades\Session;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            return Datatables::of(Gallery::all())->addIndexColumn()->make(true);
        }
        return view('dashboard.galleries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGalleryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGalleryRequest $request)
    {

        $gallery = Gallery::create(['topic' => $request->topic]);

        if ($images = $request->file('image')) {
            foreach ($images as $image) {
                $gallery->addMedia($image)->toMediaCollection('images');
            }
        }


        // if ($request->image) {
        //     foreach ($request->image as $image) {
        //         $gallery->addMediaFromRequest('image')->toMediaCollection('images');
        //     }
        // }

        return redirect()->route('galleries.edit', $gallery->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        $gallery->getMedia();
        return view('dashboard.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGalleryRequest  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {
        if ($gallery->topic != 'Home' && $request->topic != $gallery->topic) {
            $gallery->topic = $request->topic;
            $gallery->update();
        }

        if ($images = $request->file('image')) {
            foreach ($images as $image) {
                $gallery->addMedia($image)->toMediaCollection('images');
            }
        }

        return redirect()->route('galleries.edit', $gallery->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        if ($gallery->topic == 'Home') {
            return response()->json(['status' => 'error', 'message' => 'This is default topic. It can not be deleted.']);
        }
        $gallery->delete();
        return response()->json(['status' => 'success', 'message' => 'Gallery and Its Images deleted successfylly !']);
    }
}
