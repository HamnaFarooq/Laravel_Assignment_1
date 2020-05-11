<?php

namespace App\Http\Controllers;

use App\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Books::all();
        return view('books.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
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
            'Title' => 'required',
            'Author' => 'required',
            'Price' => 'required',
            'Publisher' => 'required',
            'copies' => 'required'
        ]);
        $lastbook = Books::all()->last();
        $request->merge(['Isbn' => ($lastbook->Isbn + 1)]);
        Books::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function show(Books $books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function edit( $books)
    {

        $book = Books::where('Isbn',$books)->first();
        return view('books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $books)
    {
        $validation = $request->validate([
            'Title' => 'required',
            'Author' => 'required',
            'Price' => 'required',
            'Publisher' => 'required',
            'copies' => 'required'
        ]);
        $updatedbook = Books::where('Isbn',$books)->first();
        $updatedbook->update($request->all());
        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy( $books)
    {
        $detetebook = Books::where('Isbn',$books)->first()->delete();
        return redirect('/books');
    }
}
