<?php

namespace App\Http\Controllers;

use App\Participate;
use App\Societies;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ParticipateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = session('user')->sid;
        $participated = Participate::where('sid',$user)->get();
        $clubs = ( Participate::where('sid',$user)->get('socid') );
        $arr = [];
        foreach ($clubs as $id) {
            array_push($arr, $id->socid);
        }
        $clubs = Societies::all()->except($arr);
        return view('participate.create', compact('clubs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['socid'] = $num = (int) $request->socid;
        $month = Carbon::now()->format('F');
        $request->merge(['joindate'=>$month]);
        $user = session('user')->sid;
        $request->merge(['sid'=>$user]);

        Participate::create($request->all());
        return redirect()->back();
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Participate  $participate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = session('user')->sid;
        $deteteparticipate = Participate::where('socid',$request->socid)->where('sid',$user)->first()->delete();
        return redirect('/home');
    }
}
