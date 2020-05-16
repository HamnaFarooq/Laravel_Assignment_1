@extends('layouts.layout')
@section('content')
<?php ?>
<div class="container-fluid">
    <div class="content">
        <div class="logout">
            <a href="/logout" class="btn btn-danger"> Logout </a>
        </div>

        @if(session('type') != null)
        <div class="title m-b-md">
            Welcome {{session('type')->tname}} !
        </div>

        <!--  -->
        @if(session('type')->tname == 'Student')
        <!-- Student -->
        <h3>Hi {{session('user')->sname}} !</h3>
        <!--  -->
        <div class="row">
            <b>You are Participating in the following Clubs:</b>
        </div>
        <div class="row">
            <a href="/participate" class="btn btn-primary"> Join another Club </a>
        </div>
        <div class="row">
            @foreach ( $clubs as $club )
            <div class="col col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$club->socname}}</h5>
                        <p class="card-title">Type: {{$club->type}}</p>
                    </div>
                    <form class="warn" action="/participate" method="post">
                        @csrf
                        @method('delete')
                        <input type="text" class="hidden" name="socid" value="{{$club->socid}}">
                        <button student="submit" class="btn" name="button">Leave Club</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <b>You are Registered in the following Courses:</b>
        </div>
        <div class="row">
            <a href="/" class="btn btn-primary"> Register another Course </a>
        </div>
        <div class="row">
            @foreach ( $learning as $course )
            <div class="col col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> <b>{{$course->coursetitle}}</b> </h5>
                        <p class="card-title">Credit hrs: {{$course->crdhr}}</p>
                        <p class="card-title">Type: {{$course->coursetype}}</p>
                        <p class="card-title">Pre-req: {{$course->courseprereq}}</p>
                    </div>
                    <form class="warn" action="/register" method="post">
                        @csrf
                        @method('delete')
                        <button student="submit" class="btn" name="button">Un-Register</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        <!--  -->
        @elseif(session('type')->tname == 'Teacher')
        <!-- Teacher -->
        <h3>{{session('user')->Firstname}} {{session('user')->Lastname}} <i>({{session('user')->Designation}})</i> </h3>
        <!--  -->
        <div class="row">
            <b>You are teaching:</b>
        </div>
        <div class="row">
            @foreach ( $courses as $course )
            <div class="col col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> <b>{{$course->coursetitle}}</b> </h5>
                        <p class="card-title">Credit hrs: {{$course->crdhr}}</p>
                        <p class="card-title">Type: {{$course->coursetype}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <b>Books issues by you:</b>
        </div>
        <div class="row">
            @foreach ( $books as $book )
            <div class="col col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><b>{{$book->Title}}</b> </h5>
                        <p class="card-text">{{$book->Author}}</p>
                        <p class="card-text">{{$book->Price}}$</p>
                        <p class="card-text">By: {{$book->Publisher}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!--  -->
        <!--  -->
        @else
        <div class="row">
            <h3><b>CRUDs:</b></h3>
        </div>
        <div class="row">

            <div class="col col-md-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> <b>Books</b> </h5>
                        <a href="/books" class="btn btn-primary">Visit</a>
                    </div>
                </div>
            </div>
            <div class="col col-md-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> <b>Cafes</b> </h5>
                        <a href="/cafes" class="btn btn-primary">Visit</a>
                    </div>
                </div>
            </div>
            <div class="col col-md-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> <b>Courses</b> </h5>
                        <a href="/course" class="btn btn-primary">Visit</a>
                    </div>
                </div>
            </div>
            <div class="col col-md-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> <b>Pages</b> </h5>
                        <a href="/pages" class="btn btn-primary">Visit</a>
                    </div>
                </div>
            </div>
            <div class="col col-md-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> <b>Products</b> </h5>
                        <a href="/products" class="btn btn-primary">Visit</a>
                    </div>
                </div>
            </div>
            <div class="col col-md-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> <b>Programs</b> </h5>
                        <a href="/programs" class="btn btn-primary">Visit</a>
                    </div>
                </div>
            </div>
            <div class="col col-md-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> <b>Sessions</b> </h5>
                        <a href="/sessions" class="btn btn-primary">Visit</a>
                    </div>
                </div>
            </div>
            <div class="col col-md-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> <b>Societies</b> </h5>
                        <a href="/societies" class="btn btn-primary">Visit</a>
                    </div>
                </div>
            </div>
            <div class="col col-md-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> <b>Student</b> </h5>
                        <a href="/student" class="btn btn-primary">Visit</a>
                    </div>
                </div>
            </div>
            <div class="col col-md-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> <b>Teachers</b> </h5>
                        <a href="/teachers" class="btn btn-primary">Visit</a>
                    </div>
                </div>
            </div>
            <div class="col col-md-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> <b>Types</b> </h5>
                        <a href="/types" class="btn btn-primary">Visit</a>
                    </div>
                </div>
            </div>
            <div class="col col-md-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> <b>User</b> </h5>
                        <a href="/user" class="btn btn-primary">Visit</a>
                    </div>
                </div>
            </div>


        </div>
        <!--  -->
        <!--  -->
        @endif
        <!--  -->

        @else
        redirect('/');
        @endif

    </div>
</div>
@endsection
