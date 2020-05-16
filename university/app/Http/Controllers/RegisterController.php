<?php

namespace App\Http\Controllers;

use App\Register;
use App\Course;
use App\Sessions;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = session('user')->sid;
        $courses = ( register::where('sid',$user)->get('code') );
        $arr = [];
        foreach ($courses as $id) {
            array_push($arr, $id->code);
        }
        $courses = Course::all()->except($arr);
        $sessions = Sessions::all();
        return view('register.create', compact('sessions','courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['sesid'] = $num = (int) $request->sesid;
        $request['code'] = $num = (int) $request->code;
        $user = session('user')->sid;
        $request->merge(['sid'=>$user]);
        $request->merge(['Grade'=>'A']);
        register::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\register  $register
     * @return \Illuminate\Http\Response
     */
    public function show(register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\register  $register
     * @return \Illuminate\Http\Response
     */
    public function edit(register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\register  $register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, register $register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\register  $register
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = session('user')->sid;
        $deteteregister = register::where('code',$request->code)->where('sid',$user)->first()->delete();
        return redirect('/home');
    }
}
