@extends('layouts.layout')
@section('content')

<a href="{{'/products','ProductsController'}}" class="btn"> Go Back </a>

    <div class="container-fluid">
      <div class="container">
        <h2>Edit Product</h2>
        <form action="/products/{{$product->Productid}}" method="POST">
            @csrf
            @method('patch')
          <div class="form-group">
            <label for="Productname">Product Name:</label>
            <input type="text" class="form-control" name="Productname" value="{{$product->Productname}}" placeholder="Enter Product name">
          </div>

          <div class="form-group">
            <label for="Price">Price:</label>
            <input type="text" class="form-control" name="Price" value="{{$product->Price}}" placeholder="Enter Price" >
          </div>

          @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
            @endforeach
          @endif

          <button type="submit" class="btn btn-primary">Update</button>

        </form>
        </div>
    	</div>

@endsection
