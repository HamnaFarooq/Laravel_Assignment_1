<?php

namespace App\Http\Controllers;

use App\purchase;
use Illuminate\Http\Request;

class purchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $purchases = purchase::all();
        // return view('purchase.index',compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('purchase.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validation = $request->validate([
        //     'stitle' => 'unique:purchases',
        //     'sdate' => 'required'
        // ]);
        // $lastpurchase = purchase::get()->last();
        // $request->merge(['sid' => ($lastpurchase->sid + 1)]);
        // purchase::create($request->all());
        // return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show( $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit( $purchase)
    {
        // $purchase = purchase::where('sid',$purchases)->first();
        // return view('purchase.edit',compact('purchase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $purchase)
    {
        // $validation = $request->validate([
        //     'stitle' => 'unique:purchases|required',
        //     'sdate' => 'required'
        // ]);
        // $updatedpurchase = purchase::where('sid',$purchases)->first();
        // $updatedpurchase->update($request->all());
        // return redirect('/purchases');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy( $purchase)
    {
        // $detetepurchase = purchase::where('sid',$purchases)->first()->delete();
        // return redirect('/purchases');
    }
}
