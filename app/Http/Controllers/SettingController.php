<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $settings = Setting::all();
        return view('dashboard.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSettingRequest $request)
    {
        $setting = Setting::create([
            'property' => $request->property,
            'value' => $request->value,
        ]);

        return redirect()->route('settings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        return view('dashboard.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSettingRequest  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingRequest $request, Setting $setting)
    {

        if ($setting->property == 'donation') {
            if ($setting->value == 'yes') {
                $setting->update(['value' => 'no']);
            }else {

                $setting->update(['value' => 'yes']);
            }
        }

        if ($setting->property == 'newslettertxt') {
            $setting->update(['value' => $request->value]);
        }
        if ($setting->property == 'donationtxt') {
            $setting->update(['value' => $request->value]);
        }
        if ($setting->property == 'contactxt') {
            $setting->update(['value' => $request->value]);
        }
        if ($setting->property == 'japptxt') {
            $setting->update(['value' => $request->value]);
        }
        if ($setting->property == 'vapptxt') {
            $setting->update(['value' => $request->value]);
        }

        Session::flash('message', "Updated Successfully!");

        return redirect()->route('settings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
