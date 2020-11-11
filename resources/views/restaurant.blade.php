@extends('layouts.app')

@section('content')
<div class="container"> 
    <div class="row justify-content-center">
        <div class="col">
			<div class="card">
				<div class="card-header">
					{{ $restaurant->title }}
					<div class="float-right">
						@guest
						@else
						@if($restaurant->user_id == Auth::user()->id)
							<a class="btn btn-primary" href="{{ $restaurant->id }}/consumables/create">Add Product</a>
						@endif
						@endguest
					</div>
				</div>
				<div class="card-body">
					@foreach($restaurant->consumables as $consumable)
						<div class="row justify-content-center">
        					<div class="col-md-8">
								<div class="card">
									<div class="card-header">
										{{ $consumable->title }}
										<div class="float-right">
											@guest
											@else
											@if($restaurant->user_id == Auth::user()->id)
												<form action="{{ route('consumable.destroy', $consumable->id) }}" method="POST">
												    @method('DELETE')
												    @csrf
												    <button class="btn btn-danger">Delete</button>
												</form>
											@endif
											@endguest
										</div>
									</div>
									<div class="card-body">
										<div class="float-left"> 
											{{ $consumable->description }}
										</div>
										<div class="float-right">
											€{{ $consumable->price }}
                      					@if(Auth::user())
											 <a class="btn btn-primary" href="{{ url('add-to-cart/'.$consumable->id) }}">+</a>
                      					@endif
										</div>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

