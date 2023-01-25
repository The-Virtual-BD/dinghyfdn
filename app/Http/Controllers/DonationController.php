<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\StoreDonationRequest;
use App\Http\Requests\UpdateDonationRequest;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of( Donation::all())->addIndexColumn()->make(true);
        }
        return view('dashboard.donations.index');
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
     * @param  \App\Http\Requests\StoreDonationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDonationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show(Donation $donation)
    {
        $donation = Donation::with('project')->find($donation->id);
        return view('dashboard.donations.show',compact('donation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Donation $donation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDonationRequest  $request
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDonationRequest $request, Donation $donation)
    {
        if ($request->actual_donation_ammount) {
            $donation->actual_donation_ammount = $request->actual_donation_ammount;
        }
        if ($request->donation_transaction_number) {
            $donation->donation_transaction_number = $request->donation_transaction_number;
        }
        if ($request->status) {
            $donation->status = $request->status;
        }
        $donation->update();


        return redirect()->route('donations.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donation = Donation::find($id);
        $donation->delete();
        return response()->json(['status' => 'success', 'message' => 'Donation deleted successfylly !']);
    }
}
