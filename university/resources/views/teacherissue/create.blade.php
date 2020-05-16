@extends('layouts.layout')
@section('content')
<a href="/home" class="btn"> Go Back </a>

<div class="container-fluid">
    <div class="container">
        <h2>Issue book:</h2>
        <form action="/issue" method="POST">
            @csrf

            <div class="form-group">
                <label for="Isbn">Books:</label>
                <select class="form-control" name="Isbn">
                    @foreach ($books as $book)
                    <option value={{$book->Isbn}}>{{$book->Title}}</option>
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

            <button participate="submit" class="btn btn-primary">Issue</button>

        </form>
    </div>
</div>

@endsection
