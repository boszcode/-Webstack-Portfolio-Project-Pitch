@extends('layouts.grain')

@section('title','Show Service')

@section('content')
    <div class="card card-primary card-outline col-md-8 mx-auto">
        <div class="card-body box-profile">
            <div class="text-center">
                <img class="profile-user-img img-circle" height="200" src="{{asset('storage/'.$service->image)}}" alt="Service Image">
            </div>

            <h3 class="profile-username text-center mx-3">{{$hotel->name.' Hotel'}}</h3>

            <p class="text-muted text-center">{{$service->name}}</p>

            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Service Name</b> <a class="float-right">{{$service->name}}</a>
                </li>

                <li class="list-group-item">
                    <b>Service Amount</b> <a class="float-right">{{$service->amount}}</a>
                </li>

                <li class="list-group-item">
                    <b>Service Type</b> <a class="float-right">{{$service->type}}</a>
                </li>

                <li class="list-group-item">
                    <b>Service Category</b> <a class="float-right">{{$service->category}}</a>
                </li>

                <li class="list-group-item">
                    <b>Service Price</b> <a class="float-right">{{$service->price}}</a>
                </li>
            </ul>

            <a href="{{route('service.edit',[$hotel->id,$service->id])}}" class="btn btn-primary btn-block"><b>Edit</b></a>
            <a href="#" class="btn btn-danger btn-block" onclick="{
                event.preventDefault();
                $('#delete_modal').attr('action','{{route('service.destroy',[$hotel->id,$service->id])}}')
                if (confirm('Do you want to delete?'))
                    $('#delete_modal').submit();
            }"><b>Delete</b></a>
        </div>
        <!-- /.card-body -->
    </div>
    <form action="" method="post" id="delete_modal">
        @csrf
        @method('delete')
    </form>
@endsection
