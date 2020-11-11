@extends('layouts.app')

@section('content')
<div class="container"> 
    <div class="row justify-content-center">
        <div class="col">
		@foreach($orderes as $order)
			<div class="card">
				<div class="card-header">

				</div>
				<div class="card-body">
		
				</div>
			</div>
		@endforeach
		</div>
	</div>
</div>
@endsection

