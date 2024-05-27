@extends('layouts.grain')

@section('title', 'Users')

@section('content')

@include('components.notification')

<div class="card mb-3 mb-md-4">

	<div class="card-body">
		<!-- Breadcrumb -->
		<nav class="d-none d-md-block" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page">Users</li>
			</ol>
		</nav>
		<!-- End Breadcrumb -->

		<div class="mb-3 mb-md-4 d-flex justify-content-between">
			<div class="h3 mb-0">Users</div>
			<a href="{{route('users.create')}}" class="btn btn-primary">
				Add new
			</a>
		</div>


		<!-- Users -->
		<div class="table-responsive-xl">
			<table class="table text-nowrap mb-0">
				<thead>
				<tr>
					<th class="font-weight-semi-bold border-top-0 py-2">#</th>
					<th class="font-weight-semi-bold border-top-0 py-2">First Name</th>
					<th class="font-weight-semi-bold border-top-0 py-2">Last Name</th>
					<th class="font-weight-semi-bold border-top-0 py-2">Email</th>
					<th class="font-weight-semi-bold border-top-0 py-2">User Type</th>
					<th class="font-weight-semi-bold border-top-0 py-2">Actions</th>
				</tr>
				</thead>
				<tbody>
				@forelse($users as $user)
					@if($user->role=='admin')
						@continue
					@endif
				<tr>
					<td class="py-3">{{ $user->id }}</td>
					<td class="align-middle py-3">
						<div class="d-flex align-items-center">
							{{--<div class="position-relative mr-2">--}}
								{{--<span class="indicator indicator-lg indicator-bordered-reverse indicator-top-left indicator-success rounded-circle"></span>--}}
								{{--<!--img class="avatar rounded-circle" src="#" alt="{{ $user->first_name }}"-->--}}
								{{--<span class="avatar-placeholder mr-md-2">{{ substr($user->first_name, 0, 1) }}</span>--}}
							{{--</div>--}}
							{{ $user->first_name }}
						</div>
					</td>
					<td class="py-3">{{ $user->last_name }}</td>
					<td class="py-3">{{ $user->email }}</td>
					<td class="py-3">{{ $user->role }}</td>
					<td class="py-3">
						<div class="position-relative d-flex justify-content-around">
							{{--<a class="link-dark d-inline-block" href="{{route('managers.surveyors.show',$user->id)}}">--}}
								{{--<i class="gd-more icon-text"></i>--}}
							{{--</a>--}}
							{{--<a class="link-dark d-inline-block" href="{{route('managers.surveyors.edit',$user->id)}}">--}}
								{{--<i class="gd-pencil icon-text"></i>--}}
							{{--</a>--}}
							<a class="link-dark d-inline-block" href="#" data-toggle="modal" data-target="#modal-default" onclick="{
									$('#delete_form').attr('action','{{route('users.destroy',$user->id)}}');
									if(confirm('Do you want to delete'))
										$('#delete_form').submit();
									{{--<!--$('#delete_form').attr('action','{{route('managers.surveyors.destroy',$user->id)}}')-->--}}
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
			{{ $users->links('components.pagination') }}
			
		</div>
		<!-- End Users -->
	</div>
</div>
<form method="post" id="delete_form">
	@csrf
	@method('delete')
</form>
@endsection