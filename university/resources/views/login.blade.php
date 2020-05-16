@extends('layouts.layout')
@section('content')

<div class="container-fluid">
    <div class="logout">
        <a href="/cafeteria" class="btn btn-primary"> Cafeteria </a>
    </div>

<?php if(session('user') == null){ ?>

    <div class="content">

        <div class="title m-b-md">
            Welcome!!!
        </div>
        <div class="">
            <h2>Login</h2>
        </div>
        <div class="links">
            <form action="/" method="POST">
                @csrf

                <div class="form-group">
                    <label for="tid">user type:</label>
                    <select class="form-control" name="tid">
                        @foreach( $types as $type )
                        <option value={{$type->tid}} > {{$type->tname}} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name"placeholder="Enter Name" required >
                </div>

                <div class="form-group">
                    <label for="pass">Password:</label>
                    <input type="password" class="form-control" name="pass" placeholder="Enter Password" >
                </div>

                @if($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{$error}}

                </div>
                @endforeach
                @endif

                <button student="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>

<?php }else{ ?>

      <div class="content">
          <div class="title m-b-md">
              Welcome
          </div>
          <h3>
              <a href="/home" class="btn btn-primary"> Go Home </a>
              you are already logged in!
          </h3>
      </div>

<?php } ?>

</div>

@endsection
