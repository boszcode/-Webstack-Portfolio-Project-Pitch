@extends('layouts.grain')
@section('title','Create Service')

@section('content')

    <div class="container-fluid pb-5">

        <div class="row justify-content-md-center">
            <div class="card-wrapper col-12 col-md-8 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create new service</h4>
                        <form method="post" action="{{route('service.store',$hotel->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Service Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required="" autofocus="" value="{{old('name')}}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="type">Service Type</label>
                                <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" required="" autofocus="" value="{{old('type')}}">
                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="text" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" required="" autofocus="" value="{{old('amount')}}">
                                @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" required="" autofocus="" value="{{old('category')}}">
                                @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" required="" autofocus="" value="{{old('price')}}">
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <div class="input-group">
                                    <input type="file" name="image" class="@error('image') is-invalid @enderror">
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
