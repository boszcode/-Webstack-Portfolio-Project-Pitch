@extends('layouts.grain')

@section('title','Profile')

@section('content')
    <div class="card card-primary card-outline col-md-8 mx-auto">
        <div class="card-body box-profile">
            <div class="text-center">
                {{--<img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">--}}
            </div>

            <h3 class="profile-username text-center">{{\Illuminate\Support\Facades\Auth::user()->first_name.' '.\Illuminate\Support\Facades\Auth::user()->last_name}}</h3>

            <p class="text-muted text-center">{{\Illuminate\Support\Facades\Auth::user()->role}}</p>

            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>First Name</b> <a class="float-right">{{\Illuminate\Support\Facades\Auth::user()->first_name}}</a>
                </li>
                <li class="list-group-item">
                    <b>Last Name</b> <a class="float-right">{{\Illuminate\Support\Facades\Auth::user()->last_name}}</a>
                </li>
                <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{\Illuminate\Support\Facades\Auth::user()->email}}</a>
                </li>
                <li class="list-group-item">
                    <b>Age</b> <a class="float-right">{{\Illuminate\Support\Facades\Auth::user()->age}}</a>
                </li>
                <li class="list-group-item">
                    <b>Gender</b> <a class="float-right">{{\Illuminate\Support\Facades\Auth::user()->sex==1?'Male':'Female'}}</a>
                </li>
                <li class="list-group-item">
                    <b>Phone</b> <a class="float-right">{{\Illuminate\Support\Facades\Auth::user()->phone}}</a>
                </li>
                <li class="list-group-item">
                    <b>Role</b> <a class="float-right">{{\Illuminate\Support\Facades\Auth::user()->role}}</a>
                </li>
            </ul>

            <a href="{{route('profile.edit')}}" class="btn btn-primary btn-block"><b>Edit</b></a>
        </div>
        <!-- /.card-body -->
    </div>
@endsection