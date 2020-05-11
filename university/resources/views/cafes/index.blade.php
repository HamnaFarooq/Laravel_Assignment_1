@extends('layouts.layout')
@section('content')
<div class="content">
    <div class="title m-b-md">
        Cafés
    </div>

    <div class="row">
        <a href="/cafes/create" class="btn btn-primary">Add another Cafe</a>
    </div>

    <div class="row">
        @foreach ( $cafes as $cafe )

        <div class="col col-md-2" style=" min-width:25rem;border:solid grey 1px; padding:10px; border-radius:10px; margin:5px;">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$cafe->Cafename}}</h5>
                    <p class="card-text">{{$cafe->Cafelocation}}</p>
                    <a href="/cafes/{{$cafe->CafeId}}/edit" class="btn btn-primary">Edit</a>
                    <form class="" action="/cafes/{{$cafe->CafeId}}" method="post">
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
