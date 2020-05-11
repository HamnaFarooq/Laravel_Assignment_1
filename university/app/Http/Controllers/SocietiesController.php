<?php

namespace App\Http\Controllers;

use App\Societies;
use Illuminate\Http\Request;

class SocietiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $societies = Societies::all();
        return view('societies.index',compact('societies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('societies.create');
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
            'socname' => 'unique:societies',
            'type' => 'string'
        ]);

        $lastsociety = Societies::get()->last();
        $request->merge(['socid' => ($lastsociety->socid + 1)]);
        Societies::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Societies  $societies
     * @return \Illuminate\Http\Response
     */
    public function show(Societies $societies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Societies  $societies
     * @return \Illuminate\Http\Response
     */
    public function edit($societies)
    {
        $societies = Societies::where('socid',$societies)->first();
        return view('societies.edit',compact('societies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Societies  $societies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $societies)
    {
        $validation = $request->validate([
            'socname' => 'unique:societies',
            'type' => 'string'
        ]);
        $updatedsociety = Societies::where('socid',$societies)->first();
        $updatedsociety->update($request->all());
        return redirect('/societies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Societies  $societies
     * @return \Illuminate\Http\Response
     */
    public function destroy($societies)
    {
        $detetesociety = Societies::where('socid',$societies)->first()->delete();
        return redirect('/societies');
    }
}
