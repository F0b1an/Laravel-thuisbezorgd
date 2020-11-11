@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($restaurants as $restaurant)
            <a href="restaurant/{{ $restaurant->id }}">
                <div class="card">
                    <div class="card-header">{{ $restaurant->title }}</div>

                    <div class="card-body">
                            {{ $restaurant->description }}
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
