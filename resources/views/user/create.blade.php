@extends('layouts.grain')

@section('title','Create User')

@section('content')
    <div class="container-fluid pb-5">

        <div class="row justify-content-md-center">
            <div class="card-wrapper col-12 col-md-8 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create new account</h4>
                        <form method="post" action="{{route('users.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" required="" autofocus="" value="{{old('first_name')}}">
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" required="" autofocus="" value="{{old('last_name')}}">
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="text" class="form-control @error('age') is-invalid @enderror" id="age" name="age" required="" autofocus="" value="{{old('age')}}">
                                @error('age')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <div class="d-flex">
                                    <input type="text" disabled value="+251">
                                    <input type="text" for="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required="" autofocus="" placeholder="Phone" value="{{old('phone')}}">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>


                            <div class="form-group">
                                <label for="">Sex</label>
                                <div class="form-check position-relative mb-2">
                                    <input type="radio" class="form-check-input d-none" checked value="1" id="male" name="sex">
                                    <label class="radio radio-xxs form-check-label ml-1" for="male"
                                           data-icon="">Male</label>
                                </div>

                                <div class="form-check position-relative mb-2">
                                    <input type="radio" class="form-check-input d-none" value="0" id="female" name="sex">
                                    <label class="radio radio-xxs form-check-label ml-1" for="female"
                                           data-icon="">Female</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">User Type</label>
                                <select name="role" class="custom-select">
                                    <option value="manager">Hotel Manager</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="email">E-Mail Address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required="" value="{{old('email')}}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="password">Password
                                    </label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required="" value="{{old('password')}}">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                {{--<div class="form-group col-md-6">--}}
                                    {{--<label for="password-confirm">Confirm Password--}}
                                    {{--</label>--}}
                                    {{--<input id="password-confirm" type="password" class="form-control @error('password-confirm') is-invalid @enderror" name="password_confirmation" required="" value="{{old('password_confirmation')}}">--}}
                                    {{--@error('password-confirm')--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@enderror--}}
                                {{--</div>--}}
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
