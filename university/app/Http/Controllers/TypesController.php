<?php

namespace App\Http\Controllers;

use App\Types;
use Illuminate\Http\Request;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Types::all();
        return view('types.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('types.create');
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
            'tname' => 'required | unique:types'
        ]);
        $lasttype = Types::all()->last();
        $request->merge(['tid' => ($lasttype->tid + 1)]);
        Types::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Types  $types
     * @return \Illuminate\Http\Response
     */
    public function show(Types $types)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Types  $types
     * @return \Illuminate\Http\Response
     */
    public function edit( $types)
    {
        $type = Types::where('tid',$types)->first();
        return view('types.edit',compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Types  $types
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $types)
    {
        $validation = $request->validate([
            'tname' => 'unique:types|required'
        ]);
        $updatedtype = Types::where('tid',$types)->first();
        $updatedtype->update($request->all());
        return redirect('/types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Types  $types
     * @return \Illuminate\Http\Response
     */
    public function destroy( $types)
    {
        $updatedtype = Types::where('tid',$types)->first()->delete();
        return redirect('/types');
    }
}
