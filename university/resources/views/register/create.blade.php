@extends('layouts.layout')
@section('content')
<a href="/home" class="btn"> Go Back </a>

<div class="container-fluid">
    <div class="container">
        <h2>Register Course:</h2>
        <form action="{{'/register','registerController'}}" method="POST">
            @csrf

            <div class="form-group">
                <label for="sesid">Session:</label>
                <select class="form-control" name="sesid">
                    @foreach ($sessions as $session)
                    <option value={{$session->sid}}>{{$session->stitle}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="code">Courses:</label>
                <select class="form-control" name="code">
                    @foreach ($courses as $course)
                    <option value={{$course->code}}>{{$course->coursetitle}}</option>
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

            <button register="submit" class="btn btn-primary">Register</button>

        </form>
    </div>
</div>

@endsection
