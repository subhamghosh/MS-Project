@extends('layouts.adminapp')

@section('content')

			
	<!--Registered User Data-->
		<div class="album text-muted">
			  <div class="container">
				<div class="row">		
					<div class="col-md-8 col-md-offset-2">
						<div class="well">
							<div class="card" style="border: 1px solid black;">
							@include('userdata')
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
			
@endsection
