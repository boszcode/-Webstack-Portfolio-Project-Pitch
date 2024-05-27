@extends('layouts.grain')

@section('title', 'Profile Edit')

@section('content')

@include('components.notification')

<div class="card mb-3 mb-md-4">

	<div class="card-body">
		<!-- Breadcrumb -->
		<nav class="d-none d-md-block" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
			</ol>
		</nav>
		<!-- End Breadcrumb -->

		<div class="mb-3 mb-md-4 d-flex justify-content-between">
			<div class="h3 mb-0">Update Profile</div>
		</div>


		<!-- Form -->
		<div>
			<form action="{{ route('profile.update') }}" method="POST">
				@csrf
				<div class="form-group">
					<label for="first_name">First Name</label>
					<input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" required="" autofocus="" value="{{old('first_name')??$user->first_name}}">
					@error('first_name')
					<span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
					@enderror
				</div>


				<div class="form-group">
					<label for="last_name">Last Name</label>
					<input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" required="" autofocus="" value="{{old('last_name')??$user->last_name}}">
					@error('last_name')
					<span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
					@enderror
				</div>

				<div class="form-group">
					<label for="age">Age</label>
					<input type="text" class="form-control @error('age') is-invalid @enderror" id="age" name="age" required="" autofocus="" value="{{old('age')??$user->age}}">
					@error('age')
					<span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
					@enderror
				</div>

				<div class="form-group">
					<label for="phone">Phone</label>
					<input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required="" autofocus="" value="{{old('phone')??$user->phone}}">
					@error('phone')
					<span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
					@enderror
				</div>


				<div class="form-group">
					<label for="">Sex</label>
					<div class="form-check position-relative mb-2">
						<input type="radio" class="form-check-input d-none" {{$user->sex == 1 ? 'checked':''}} value="1" id="male" name="sex">
						<label class="radio radio-xxs form-check-label ml-1" for="male"
							   data-icon="">Male</label>
					</div>

					<div class="form-check position-relative mb-2">
						<input type="radio" class="form-check-input d-none" {{$user->sex == 0 ? 'checked':''}} value="0" id="female" name="sex">
						<label class="radio radio-xxs form-check-label ml-1" for="female"
							   data-icon="">Female</label>
					</div>
				</div>

				<div class="form-group">
					<label for="email">E-Mail Address</label>
					<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required="" value="{{old('email')??$user->email}}">
					@error('email')
					<span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
					@enderror
				</div>

				<div class="form-row border p-2 mb-3">
					<div class="col-12">
						<div class="font-weight-semi-bold h5 mb-3">Change Password</div>
					</div>
					<div class="form-group col-12 col-md-4">
						<label for="current_password">Current Password</label>
						<input type="password" class="form-control @error('current_password') is-invalid @enderror " id="current_password" name="current_password" placeholder="Current Password">
						@error('current_password')
						<span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
						@enderror
					</div>
					<div class="form-group col-12 col-md-4">
						<label for="password">New Password</label>
						<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="New Password">
						@error('password')
						<span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
						@enderror
					</div>
					<div class="form-group col-12 col-md-4">
						<label for="password_confirmation">Confirm New Password</label>
						<input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirm New Password">
						@error('password_confirmation')
						<span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
						@enderror
					</div>
				</div>
				<button type="submit" class="btn btn-primary float-right">Update</button>
			</form>
		</div>
		<!-- End Form -->
	</div>
</div>
@endsection