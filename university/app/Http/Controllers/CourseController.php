<?php

namespace App\Http\Controllers;

use App\Course;
use App\Programs;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = course::with('program')->get();
        return view('course.index',compact(['courses']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = programs::all();
        return view('course.create',compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['tid'] = $num = (int) $request->tid;
        $total_programs = count(programs::all());
        $validation = $request->validate([
            'pid' => "required|numeric | lte:$total_programs",
            'pid' => 'numeric|gt:0'
        ]);
        $lastcourse = course::all()->last();
        $request->merge(['code' => ($lastcourse->code + 1)]);
        course::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show( $course)
    {
        $course = course::with('program')->where('code',$course)->first();
        return view('course.show',compact(['course']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit( $course)
    {
        $programs = programs::all();
        $course = course::with('program')->where('code',$course)->first();  
        return view('course.edit',compact('course','programs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $course)
    {
        $updatedcourse = course::where('code',$course)->first();
        $request['pid'] = (int) $request->pid;
        $total_programs = count(programs::all());
        $validation = $request->validate([
            'pid' => "required | numeric | min:1 | lte:$total_programs"
        ]);
        $updatedcourse->update($request->all());
        return redirect('/course');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy( $course)
    {
        $updatedcourse = course::where('code',$course)->first()->delete();
        return redirect('/course');
    }
}
