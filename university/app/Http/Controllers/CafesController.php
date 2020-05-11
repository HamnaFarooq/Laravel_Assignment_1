<?php

namespace App\Http\Controllers;

use App\Cafes;
use Illuminate\Http\Request;

class CafesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cafes = Cafes::get();
        return view('cafes.index',compact('cafes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cafes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'Cafename' => 'unique:cafes'
        ]);
        $lastcafe = Cafes::get()->last();
        $request->merge(['CafeId' => ($lastcafe->CafeId + 1)]);
        Cafes::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cafes  $cafe
     * @return \Illuminate\Http\Response
     */
    public function show(Cafes $cafe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cafes  $cafe
     * @return \Illuminate\Http\Response
     */
    public function edit(Cafes $cafe)
    {
        $cafe = Cafes::find($cafe)->first();
        return view('cafes.edit',compact('cafe'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cafes  $cafe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cafes $cafe)
    {
        $validation = $request->validate([
            'Cafename' => 'unique:cafes'
        ]);
        $request->merge(['CafeId' => ($cafe->CafeId)]);
        $cafe->fill($request->all())->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cafes  $cafe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cafes $cafe)
    {
        $deleteCafe = Cafes::find($cafe)->first()->delete();
        return redirect('/cafes');
    }
}
