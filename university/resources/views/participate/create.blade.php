@extends('layouts.layout')
@section('content')
<a href="/home" class="btn"> Go Back </a>

<div class="container-fluid">
    <div class="container">
        <h2>Join Society:</h2>
        <form action="{{'/participate','participateController'}}" method="POST">
            @csrf

            <div class="form-group">
                <label for="socid">Societies:</label>
                <select class="form-control" name="socid">
                    @foreach ($clubs as $club)
                    <option value={{$club->socid}}>{{$club->socname}}</option>
                    @endforeach
                </select>
            </div>

            @if($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>
            @endforeach
            @endif

            <button participate="submit" class="btn btn-primary">Join</button>

        </form>
    </div>
</div>

@endsection
