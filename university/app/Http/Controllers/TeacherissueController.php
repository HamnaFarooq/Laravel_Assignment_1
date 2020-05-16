<?php

namespace App\Http\Controllers;

use App\Teacherissue;
use App\Books;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TeacherissueController extends Controller
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
        $books = Books::all();
        return view('teacherissue.create', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = session('user')->TId;
        $issued = Carbon::now()->toDateString();
        $request['Isbn'] = $num = (int) $request->Isbn;
        $request->merge(['Issuedate'=>$issued]);
        $request->merge(['Tid'=>$user]);
        teacherissue::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacherissue  $teacherissue
     * @return \Illuminate\Http\Response
     */
    public function show(Teacherissue $teacherissue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacherissue  $teacherissue
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacherissue $teacherissue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacherissue  $teacherissue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = session('user')->TId;
        $update = Teacherissue::where('Isbn',$request->Isbn)->where('tid',$user)->first();
        $returned = Carbon::now()->toDateString();
        $request->merge(['returndate'=>$returned]);
        $update->update($request->all());
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacherissue  $teacherissue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacherissue $teacherissue)
    {
        //
    }
}
