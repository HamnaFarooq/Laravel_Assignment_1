@extends('layouts.layout')
@section('content')
<div class="container-fluid">
    <div class="content">
        <div class="title m-b-md">
            Welcome!
        </div>
        <div class="links">
            <h2>{{session('type')[0]->tname}} Home</h2>
        </div>

        @if(session('user') != null)

            <!--  -->
            @if(session('type')[0]->tname == 'Student')
                <!-- Student -->
                <!--  -->
                <div class="row">
                    <b>You are Participating in the following Clubs:</b>
                </div>
                <div class="row">
                        @foreach ( $clubs as $club )
                            <div class="col col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$club->socname}}</h5>
                                        <p class="card-title">Type: {{$club->type}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>

                <div class="row">
                    <b>You are Registered in the following Courses:</b>
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
                                </div>
                            </div>
                        @endforeach
                </div>
                <!--  -->
            @else
                <!-- Teacher -->
                <h3>{{session('user')->Firstname}} {{session('user')->Lastname}}</h3>
                <!--  -->
                <div class="row">
                    <b>You are teaching:</b>
                </div>
                <div class="row">
                        @foreach ( $courses as $course )
                            <div class="col col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$course->coursetitle}}</h5>
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
                                <h5 class="card-title">{{$book->Title}}</h5>
                                <p class="card-text">{{$book->Author}}</p>
                                <p class="card-text">{{$book->Price}}$</p>
                                <p class="card-text">By:{{$book->Publisher}}</p>
                                <p class="card-text">{{$book->copies}} copies</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!--  -->
            @endif
            <!--  -->

        @else
            redirect('/');
        @endif

        <div class="">
            <a href="/logout" class="btn btn-primary"> Logout </a>
        </div>
    </div>
</div>

@endsection
