<?php

namespace App\Http\Controllers;

use App\User;
use App\Types;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('type')->get();
        return view('user.index',compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Types::all();
        return view('user.create',compact('types'));
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
        $total_types = count(Types::all());
        $validation = $request->validate([
            // 'tid' => "required | numeric | gt:$min | lte:$total_types"
            'tid' => "required | numeric | min:1 | lte:$total_types"
        ]);
        $lastuser = User::all()->last();
        $request->merge(['id' => ($lastuser->id + 1)]);
        User::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $users=$user;
        $types = Types::all();
        $user = User::with('type')->where('id',$users)->first();
        return view('user.edit',compact('user','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        $updateduser = User::where('id',$user)->first();
        $request['tid'] = $num = (int) $request->tid;
        $total_types = count(Types::all());
        $validation = $request->validate([
            'tid' => "required | numeric | min:1 | lte:$total_types"
        ]);
        $updateduser->update($request->all());
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $updateduser = User::where('id',$user)->first()->delete();
        return redirect('/user');
    }
}
