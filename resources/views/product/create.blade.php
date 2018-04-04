@extends('layouts.app')



@section('content')


	<div class="container">
		<div class="row">
@include('components.sidebar')
			<div class=" col-md-6 col-md-offset-3">
@include('components.notification')
				<div class=" well" >
					<h3 style="text-align: center;">Post Advertisement</h3>
					
				{!! Form::open(['route'=>'product.store', 'method'=> 'post', 'files'=>true]) !!}
					<div class="form-group ">
			{{Form::label('name', 'Name')}}
			{{Form::text('name', null,array('class'=>'form-control','placeholder'=>'Enter a Heading!!!'))}}
		</div>
		
					<div class="form-group">
			{{Form::label('description', 'Description')}}
			{{Form::text('description', null,array('class'=>'form-control','placeholder'=>'Provide detail of the item'))}}
		</div>
				
				<div class="form-group">
			{{Form::label('price', 'Price')}}
			{{Form::text('price', null,array('class'=>'form-control','placeholder'=>'Enter Price in USD : Example $500'))}}
		</div>	
		
		<div class="form-group">
			{{Form::label('mobile', 'Mobile')}}
			{{Form::text('mobile', null,array('class'=>'form-control','placeholder'=>'Provide your mobile number: Example 660-111-1234'))}}
		</div>
		
					<div class="form-group">
			{{Form::label('image', 'Image')}}
			{{Form::file('image',array('class'=>'form-control'))}}
		</div>
		
		<div class="form-group">
			{{Form::label('category_id', 'Categories')}}
			{{Form::select('category_id',$categories,null,['class'=>'form-control','placeholder'=>'Select'])}}
		</div>
		
					
		
				<div class="form-group">
			{{Form::label('email', 'Email')}}
			{{Form::text('email', Auth::user()->email)}}
		</div>
		
					{{Form::submit('Post',array('class'=>'btn btn-primary'))}}
	
				{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>


@endsection
