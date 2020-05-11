@extends('layouts.layout')
@section('content')

<a href="{{'/cafes','cafesController'}}" class="btn"> Go Back </a>

    <div class="container-fluid">
      <div class="container">
        <h2>Edit Cafe</h2>
        <form action="/cafes/{{$cafe->CafeId}}" method="POST">
            @csrf
            @method('PATCH')

          <div class="form-group">
            <label for="Cafename">cafe Name:</label>
            <input type="text" class="form-control" name="Cafename" value="{{$cafe->Cafename}}" placeholder="Enter cafe name">
          </div>

          <div class="form-group">
            <label for="Cafelocation">Cafe location:</label>
            <input type="text" class="form-control" name="Cafelocation" value="{{$cafe->Cafelocation}}" placeholder="Enter Cafe location" >
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
