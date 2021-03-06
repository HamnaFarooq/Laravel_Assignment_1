@extends('layouts.layout')
@section('content')

<a href="{{'/products','ProductsController'}}" class="btn"> Go Back </a>

    <div class="container-fluid">
      <div class="container">
        <h2>Add Product</h2>
        <form action="{{'/products','ProductsController'}}" method="POST">
            @csrf

          <div class="form-group">
            <label for="Productname">Product Name:</label>
            <input type="text" class="form-control" name="Productname" placeholder="Enter Product name" required>
          </div>

          <div class="form-group">
            <label for="Price">Price:</label>
            <input type="text" class="form-control" name="Price" placeholder="Enter Price" required>
          </div>

          @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
            @endforeach
          @endif

          <button type="submit" class="btn btn-primary">Submit</button>

        </form>
        </div>
    	</div>

@endsection
