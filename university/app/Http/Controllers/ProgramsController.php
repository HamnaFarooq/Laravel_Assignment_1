<?php

namespace App\Http\Controllers;

use App\Programs;
use Illuminate\Http\Request;

class ProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Programs::all();
        return view('programs.index',compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programs.create');
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
            'ptitle' => 'unique:programs',
            'duration' => 'regex:[[0-7]\s[\y\e\a\r][s]?]'
        ]);
        $lastprogram = programs::get()->last();
        $request->merge(['pid' => ($lastprogram->pid + 1)]);
        programs::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Programs  $programs
     * @return \Illuminate\Http\Response
     */
    public function show(Programs $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Programs  $programs
     * @return \Illuminate\Http\Response
     */
    public function edit(Programs $program)
    {
        $editedprogram = Programs::find($program)->first();
        return view('programs.edit',compact('program',$editedprogram));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Programs  $programs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programs $program)
    {
        $validation = $request->validate([
            'ptitle' => 'unique:programs|required',
            'duration' => 'regex:[[0-7]\s[\y\e\a\r][s]?]'
        ]);
        $updatedprogram = Programs::find($program)->first();
        $updatedprogram->update($request->all());
        return redirect('/programs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Programs  $programs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programs $program)
    {
        $deteteprogram = Programs::find($program)->first()->delete();
        return redirect('/programs');
    }
}
