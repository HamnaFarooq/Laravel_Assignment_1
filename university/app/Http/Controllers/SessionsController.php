<?php

namespace App\Http\Controllers;

use App\Sessions;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = Sessions::all();
        return view('sessions.index',compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sessions.create');
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
            'stitle' => 'unique:sessions',
            'sdate' => 'required'
            // 'sdate' => 'regex:[\m]'
            // 'sdate' => 'regex:[ [J/a/n/u/a/r/y] + [/F/e/b/r/u/a/r/y] + [M/a/r/c/h] + [A/p/r/i/l/$] + [/M/a/y] + [/J/u/n/e] + [/J/u/l/y] + [/A/u/g/u/s/t] + [/S/e/p/t/e/m/b/e/r] + [/O/c/t/u/b/e/r] + [/N/o/v/e/m/b/e/r] + [/D/e/c/e/m/b/e/r] ]'
            // 'sdate' => 'january' | 'february' | 'march' | 'april' | 'may' | 'june' | 'july' | 'august' | 'september' | 'october' | 'november' | 'december'
        ]);
        $lastsession = Sessions::get()->last();
        $request->merge(['sid' => ($lastsession->sid + 1)]);
        Sessions::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sessions  $sessions
     * @return \Illuminate\Http\Response
     */
    public function show($sessions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sessions  $sessions
     * @return \Illuminate\Http\Response
     */
    public function edit($sessions)
    {
        $session = Sessions::where('sid',$sessions)->first();
        return view('sessions.edit',compact('session'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sessions  $sessions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sessions)
    {
        $validation = $request->validate([
            'stitle' => 'unique:sessions|required',
            'sdate' => 'required'
        ]);
        $updatedsession = sessions::where('sid',$sessions)->first();
        $updatedsession->update($request->all());
        return redirect('/sessions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sessions  $sessions
     * @return \Illuminate\Http\Response
     */
    public function destroy($sessions)
    {
        $detetesession = Sessions::where('sid',$sessions)->first()->delete();
        return redirect('/sessions');
    }
}
