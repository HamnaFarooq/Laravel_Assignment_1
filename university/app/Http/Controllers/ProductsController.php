<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validation = $request->validate([
            'Productname' => 'unique:products',
            'Price' => 'integer'
        ]);

        $lastprod = Products::all()->last();
        $newid = "p". (substr($lastprod->Productid, 1,) +1 ) ;
        $request->merge(['Productid' => $newid ]);
        Products::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show($products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        $editedproduct = Products::find($product)->first();
        return view('products.edit',compact('product',$editedproduct));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Products $product)
    {
        $validation = $request->validate([
            'Productname' => 'unique:products',
            'Price' => 'integer'
        ]);
        $updatedproduct = Products::find($product)->first();
        $updatedproduct->update($request->all());
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        $deteteproduct = Products::find($product)->first()->delete();
        return redirect('/products');
    }
}
