@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($users as $user)
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin.user.show', $user->id) }}">{{ $user->name }} </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
