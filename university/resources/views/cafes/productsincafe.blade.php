    @extends('layouts.layout')
    @section('content')
    <div class="content">
        <div class="logout">
            <a href="/home" class="btn btn-primary"> Home </a>
        </div>
        <div class="row">
            <div class="title m-b-md">
                Cafés
            </div>
        </div>

        @foreach ( $cafes as $cafe )
        <div class="row">
            <h4 class="card-title"><b>{{$cafe->Cafename}}</b> <i class="card-text"> ( Location: {{$cafe->Cafelocation}} )</i></h4>

        </div>
<div class="row">
            @foreach ( $cafe->products as $product )

            <div class="col col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->Productname}}</h5>
                        <p class="card-text">{{$product->Price}}</p>
                    </div>
                </div>
                </div>

        @endforeach

    </div>

        @endforeach


    </div>
    @endsection
