@extends('layouts.adminapp')

@section('content')

	<!--ADMINISTRATOR Dashboard Data-->
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default">
						<div class="panel-heading">ADMIN Dashboard</div>
							<div class="panel-body">
								@if (session('status'))
									<div class="alert alert-success">
										{{ session('status') }}
									</div>
								@endif					
									<div class="panel-body">
									{{--@component('components.who')
									@endcomponent--}}
									</div>
								You are logged in as <strong>ADMINISTRATOR</strong>!
							</div>
					</div>
				</div>
			</div>
		</div>
		
		
		<!--Registered User Data-->
		<div class="album text-muted">
			  <div class="container">
				<div class="row">		
					<div class="col-md-8 col-md-offset-2">
						<div class="well">
							
							@include('userdata')
							
						</div>
					</div>
				</div>
			</div>
		</div>
		
	<!--User Post Data-->
		<div class="album text-muted">
			 <div class="container">
				<div class="row">		
					<div class="col-md-8 col-md-offset-2">
						<div class="well">
							
							@include('userproduct')
							
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--User email Data
		<div class="album text-muted">
			 <div class="container">
				<div class="row">		
					<div class="col-md-8 col-md-offset-2">
						<div class="well">
							<div class="card" style="border: 1px solid black;">
							@include('mail')
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>-->
@endsection
