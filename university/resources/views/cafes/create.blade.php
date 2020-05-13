@extends('layouts.layout')
@section('content')

<a href="{{'/cafes','CafesController'}}" class="btn"> Go Back </a>

    <div class="container-fluid">
      <div class="container">
        <h2>Add Cafe:</h2>
        <form action="{{'/cafes','CafesController'}}" method="POST">
            @csrf

          <div class="form-group">
            <label for="Cafename">Cafe Name:</label>
            <input type="text" class="form-control" name="Cafename" placeholder="Enter Cafe name" required>
          </div>

          <div class="form-group">
            <label for="Cafelocation">Cafe Location:</label>
            <input type="text" class="form-control" name="Cafelocation" placeholder="Enter Location" required>
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
