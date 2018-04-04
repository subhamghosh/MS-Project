@extends('layouts.app')

@section('content')

		<div class="container">
			<div class="row">
			@include('components.sidebar')
			
				<div class="col-md-10 col-md-offset-2">
				@include('components.notification')
					<div class="panel panel-default">
						<div class="panel-heading"><h3 style="text-align: center;">Classified</h3></div>
							<div class="panel-body">
								@if (session('status'))
									<div class="alert alert-success">
										{{ session('status') }}
									</div>
								@endif
								
								<div class="text-center">
								{!! $products->links();!!}
								</div>

								@forelse($products as $product)
								 <div class="col-md-4">  
									<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center"> 									
										<a href="{{route('product.show',$product->id)}}" style="display: block;margin: auto;width: 40%;">
											<img src="{{url('images',$product->image)}}" alt="{{$product->name}}"style="display: block;margin: auto;width: 150px; height:150px"/>
										</a>
										<h4 class="text-danger" style="word-wrap: break-word;text-align: center;">{{$product->price}} {{$product->name}}</h4>
									</div>
									<br>
									</div>
								@empty
									<h3>No data</h3>
									
								@endforelse
								<div class="text-center">
								{!! $products->links();!!}
								</div>	
							</div>
					</div>			  
				</div>
			</div>
		</div>	
		  
@endsection


