@extends('layouts.grain')

@section('title','Welcome Hospital Representative')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @forelse($hotels as $hotel)
                <div class="card card-outline card-primary ml-2 col-md-12 mx-auto">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover my-4">

                            <thead>
                            <tr>
                                <th colspan="5" class="text-center">{{$hotel->name}}</th>
                            </tr>

                            <tr>
                                <th>Service Name</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse($hotel->services as $service)
                                <tr>
                                    <td><strong>{{$service->name}}</strong></td>
                                    <td><strong>{{$service->type}}</strong></td>
                                    <td><strong>{{$service->amount}}</strong></td>
                                    <td><strong>{{$service->category}}</strong></td>
                                    <td><strong>{{$service->price}}</strong></td>
                                    <td class="py-3">
                                        <div class="position-relative d-flex justify-content-around">
                                            <a class="link-dark d-inline-block" href="{{route('service.edit',[$hotel->id,$service->id])}}">
                                                <i class="gd-pencil icon-text"></i>
                                            </a>
                                            <a class="link-dark d-inline-block" href="{{route('service.show',[$hotel->id,$service->id])}}">
                                                <i class="gd-more icon-text"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center"><strong>No service found</strong></td>
                                </tr>
                            @endforelse
                            <tr>
                                <td colspan="6" class=""><a href="{{route('service.create',$hotel->id)}}" class="btn btn-primary">Add Service</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @empty
                No Hotel Available
            @endforelse
        </div>
    </div>

@endsection
