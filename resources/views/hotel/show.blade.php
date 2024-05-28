@extends('layouts.grain')

@section('title','Profile')

@section('content')
    <div class="card card-primary card-outline col-md-8 mx-auto">
        <div class="card-body box-profile">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{asset('storage/'.$hotel->image)}}" alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{$hotel->name}}</h3>


            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Name</b> <a class="float-right">{{$hotel->name}}</a>
                </li>
                <li class="list-group-item">
                    <b>Hotel Representative</b> <a class="float-right">{{ $hotel->user?$hotel->user->first_name.' '.$hotel->user->last_name:'No Representative' }}</a>
                </li>
                <li class="list-group-item">
                    <b>Location</b> <a class="float-right">{{$hotel->location}}</a>
                </li>
                <li class="list-group-item">
                    <b>Star Level</b> <a class="float-right">{{$hotel->star_level}}</a>
                </li>
            </ul>

            <a href="{{route('hotels.edit',$hotel->id)}}" class="btn btn-primary btn-block"><b>Edit</b></a>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
