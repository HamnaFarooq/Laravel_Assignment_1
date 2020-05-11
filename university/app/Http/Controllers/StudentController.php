<?php

namespace App\Http\Controllers;

use App\Student;
use App\Programs;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = student::with('program')->get();
        return view('student.index',compact(['students']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = programs::all();
        return view('student.create',compact('programs'));
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
        $laststudent = student::all()->last();
        $request->merge(['sid' => ($laststudent->sid + 1)]);
        student::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show( $student)
    {
        $student = student::with('program')->where('sid',$student)->first();
        return view('student.show',compact(['student']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit( $student)
    {
        $programs = programs::all();
        $student = student::with('program')->where('sid',$student)->first();
        // dd($student);
        return view('student.edit',compact('student','programs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $student)
    {
        $updatedstudent = student::where('sid',$student)->first();
        $request['pid'] = (int) $request->pid;
        $total_programs = count(programs::all());
        $validation = $request->validate([
            'pid' => "required | numeric | min:1 | lte:$total_programs"
        ]);
        $updatedstudent->update($request->all());
        return redirect('/student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy( $student)
    {
        $updatedstudent = student::where('sid',$student)->first()->delete();
        return redirect('/student');
    }
}
