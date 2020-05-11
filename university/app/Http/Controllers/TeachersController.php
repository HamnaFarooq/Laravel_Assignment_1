<?php

namespace App\Http\Controllers;

use App\Teachers;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teachers::all();
        return view('teachers.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teachers.create');
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
            'Firstname' => 'required',
            'Lastname' => 'required',
            'Designation' => 'required',
            'Experience' => 'required'
        ]);

        $lastteacher = Teachers::all()->last();
        $request->merge(['TId' => ($lastteacher->TId + 1)]);
        Teachers::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function show(Teachers $teachers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function edit( $teachers)
    {
        $teacher = Teachers::where('TId',$teachers)->first();
        return view('teachers.edit',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $teachers)
    {
        $validation = $request->validate([
            'Firstname' => 'required',
            'Lastname' => 'required',
            'Designation' => 'required',
            'Experience' => 'required'
        ]);
        $updatedteacher = Teachers::where('TId',$teachers)->first();
        $updatedteacher->update($request->all());
        return redirect('/teachers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function destroy( $teachers)
    {
        $deteteteacher = Teachers::where('TId',$teachers)->first()->delete();
        return redirect('/teachers');
    }
}
