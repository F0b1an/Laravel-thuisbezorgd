@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (session('status'))
            <div class="card-header">
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            </div>
        @endif
        <div class="col-md">
            <div class="card">
                <div class="card-header h3">
                    <b>{{ $user->name }}</b>
                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary float-right">Edit</a>

                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col"> 
                            <div class="row"> 
                                Address: {{ $user->address }}
                            </div>
                            <div class="row"> 
                                Zip Code: {{ $user->zip_code }}
                            </div>
                            <div class="row"> 
                                Email: {{ $user->email }}
                            </div>
                            <div class="row"> 
                                Created At: {{ $user->created_at }}
                            </div>
                        </div>
                        <div class="col">
                            @if($user->restaurant)
                            <div class="card">
                                <div class="card-header">
                                    Restaurant details:
                                    <div class="float-right">
                                        <a class="btn btn-primary" href="{{ route('admin.restaurant.edit', $user->restaurant->id)}}">Edit</a>
                                    </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            title: {{ $user->restaurant->title }}
                                        </div>
                                        <div class="row">
                                            description: {{ $user->restaurant->description }}
                                        </div>
                                        <div class="row">
                                            address: {{ $user->restaurant->address }}
                                        </div>
                                        <div class="row">
                                            zip code: {{ $user->restaurant->zip_code }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @if($user->orders)
            <div class="card">
                <div class="card-header">
                    Orders
                </div>
                <div class="card-body">
                    @foreach($user->orders as $order)
                    <div class="card">
                        <div class="card-header"> 
                            Restaurant: {{ $order->restaurant->title }}
                        </div>
                        <div class="card-body">
                            <ul>
                                @foreach($order->consumables as $consumable)
                                    <li>{{ $consumable->quantity . $consumable->title }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
{{-- <script type="text/javascript">
    $('#like-button').click(function(event) {

    event.preventDefault();

    axios.get($(this).prop('href'))

        .finally(function () {

            // $('like-button').html('Dislike');

        });

    return false;

});
</script> --}}
@endsection


