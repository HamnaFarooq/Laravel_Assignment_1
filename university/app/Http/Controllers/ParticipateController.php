<?php

namespace App\Http\Controllers;

use App\Participate;
use Illuminate\Http\Request;

class ParticipateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $participates = Participate::all();
        // return view('participate.index',compact('participates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('participate.create');
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
        //     'stitle' => 'unique:participates',
        //     'sdate' => 'required'
        // ]);
        // $lastparticipate = Participate::get()->last();
        // $request->merge(['sid' => ($lastparticipate->sid + 1)]);
        // Participate::create($request->all());
        // return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Participate  $participate
     * @return \Illuminate\Http\Response
     */
    public function show( $participate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Participate  $participate
     * @return \Illuminate\Http\Response
     */
    public function edit( $participate)
    {
        // $participate = Participate::where('sid',$participates)->first();
        // return view('participate.edit',compact('participate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Participate  $participate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $participate)
    {
        // $validation = $request->validate([
        //     'stitle' => 'unique:participates|required',
        //     'sdate' => 'required'
        // ]);
        // $updatedparticipate = Participate::where('sid',$participates)->first();
        // $updatedparticipate->update($request->all());
        // return redirect('/participates');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Participate  $participate
     * @return \Illuminate\Http\Response
     */
    public function destroy( $participate)
    {
        // $deteteparticipate = Participate::where('sid',$participates)->first()->delete();
        // return redirect('/participates');
    }
}
