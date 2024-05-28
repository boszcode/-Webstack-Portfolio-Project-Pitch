@extends('layouts.grain')

@section('title','Create Hotel')

@section('content')
    <div class="container-fluid pb-5">

        <div class="row justify-content-md-center">
            <div class="card-wrapper col-12 col-md-8 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create new account</h4>
                        <form method="post" action="{{route('hotels.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Hotel Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required="" autofocus="" value="{{old('name')}}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="location">Hotel Location</label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" required="" autofocus="" value="{{old('location')}}">
                                @error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="star_level">Star Level</label>
                                <input type="text" class="form-control @error('star_level') is-invalid @enderror" id="star_level" name="star_level" required="" autofocus="" value="{{old('star_level')}}">
                                @error('star_level')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="user_id">User Type</label>
                                <select name="user_id" class="custom-select">
                                    @forelse($users as $user)
                                        <option value="{{$user->id}}">{{$user->first_name.' '.$user->last_name}}</option>
                                    @empty
                                        <option>No User Yet</option>
                                    @endforelse
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <div class="input-group">
                                    <input type="file" name="image" class=" @error('image') is-invalid @enderror">
                                </div>

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group no-margin">
                                <button class="btn btn-primary btn-block">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
