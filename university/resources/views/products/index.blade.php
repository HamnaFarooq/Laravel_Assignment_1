@extends('layouts.layout')
@section('content')
<div class="content">
    <div class="title m-b-md">
        Products
    </div>

    <div class="row">
        <a href="/products/create" class="btn btn-primary">Add another Product</a>
    </div>

    <div class="row">
        @foreach ( $products as $product )

        <div class="col col-md-2" style=" min-width:25rem;border:solid grey 1px; padding:10px; border-radius:10px; margin:5px;">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$product->Productname}}</h5>
                    <p class="card-text">{{$product->Price}}</p>
                    <a href="/products/{{$product->Productid}}/edit" class="btn btn-primary">Edit</a>
                    <form class="" action="/products/{{$product->Productid}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" name="button">Delete</button>
                    </form>
                </div>
            </div>
        </div>

        @endforeach

    </div>



</div>
@endsection


<!-- <form class="" action="/products/{{$product->Productid}}/edit" method="post">
    @csrf
    @method('get')
    <input type="hidden" name="Productid" value="{{$product->Productid}}">
    <input type="hidden" name="Productname" value="{{$product->Productname}}">
    <input type="hidden" name="Price" value="{{$product->Price}}">
    <button type="submit" class="card-link btn btn-primary">Submit</button>
</form> -->
