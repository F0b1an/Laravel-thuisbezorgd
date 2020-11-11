@extends('layouts.app')

@section('content')
<div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
    @endif
    <form action="/user/{{ $user->id }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="card">
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label text-md-right">Name:</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" />
                </div>
            </div>
            <div class="form-group row">
                <label for="address" class="col-md-2 col-form-label text-md-right">Address:</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="address" value="{{ $user->address }}" />
                </div>
            </div>
            <div class="form-group row">
                <label for="zip_code" class="col-md-2 col-form-label text-md-right">Zip Code:</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="zip_code" value="{{ $user->zip_code }}" />
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label text-md-right">Email:</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="email" value="{{ $user->email }}" />
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    <a href="{{ route('admin.user.show', $user->id) }}" class="btn btn-danger float-right">Back</a>
                </div>
                <div class="col-md-7">
                    <button type="submit" class="btn btn-success float-right">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection