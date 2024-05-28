@extends('layouts.grain')

@section('title', 'Hotels')

@section('content')

    @include('components.notification')

    <div class="card mb-3 mb-md-4">

        <div class="card-body">
            <!-- Breadcrumb -->
            <nav class="d-none d-md-block" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Hotels</li>
                </ol>
            </nav>
            <!-- End Breadcrumb -->

            <div class="mb-3 mb-md-4 d-flex justify-content-between">
                <div class="h3 mb-0">Hotels</div>
                <a href="{{route('hotels.create')}}" class="btn btn-primary">
                    Add new
                </a>
            </div>


            <!-- Hotels -->
            <div class="table-responsive-xl">
                <table class="table text-nowrap mb-0">
                    <thead>
                    <tr>
                        <th class="font-weight-semi-bold border-top-0 py-2">#</th>
                        <th class="font-weight-semi-bold border-top-0 py-2">Hotel Name</th>
                        <th class="font-weight-semi-bold border-top-0 py-2">Hotel Representative</th>
                        <th class="font-weight-semi-bold border-top-0 py-2">Star Level</th>
                        <th class="font-weight-semi-bold border-top-0 py-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($hotels as $hotel)
                        @if($hotel->role=='admin')
                            @continue
                        @endif
                        <tr>
                            <td class="py-3">{{ $hotel->id }}</td>
                            <td class="align-middle py-3">
                                <div class="d-flex align-items-center">
                                    {{ $hotel->name }}
                                </div>
                            </td>
                            <td class="py-3">{{ $hotel->user?$hotel->user->first_name.' '.$hotel->user->last_name:'No Representative' }}</td>
                            <td class="py-3">{{ $hotel->star_level }}</td>
                            <td class="py-3">
                                <div class="position-relative d-flex justify-content-around">
                                    <a class="link-dark d-inline-block" href="{{route('hotels.edit',$hotel->id)}}">
                                        <i class="gd-pencil icon-text"></i>
                                    </a>
                                    <a class="link-dark d-inline-block" href="{{route('hotels.show',$hotel->id)}}">
                                        <i class="gd-more icon-text"></i>
                                    </a>
                                    <a class="link-dark d-inline-block" href="#" data-toggle="modal" data-target="#modal-default" onclick="{
                                            $('#delete_form').attr('action','{{route('hotels.destroy',$hotel->id)}}');
                                            if(confirm('Do you want to delete?'))
                                                $('#delete_form').submit();
                                    {{--<!--$('#delete_form').attr('action','{{route('managers.surveyors.destroy',$hotel->id)}}')-->--}}
                                            }">
                                        <i class="gd-trash icon-text"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="align-center">
                                <strong>No records found</strong><br>
                            </td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
                {{ $hotels->links('components.pagination') }}

            </div>
            <!-- End Hotels -->
        </div>
    </div>
    <form method="post" id="delete_form">
        @csrf
        @method('delete')
    </form>
@endsection
