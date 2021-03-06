@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
	@include('components.sidebar')
        <div class="col-md-8 col-md-offset-2">
		@include('components.notification')
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center;">Home Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
			
					<div class="panel-body">
						<!--@component('components.who')
						@endcomponent-->
					</div>

                    
					<br>
					@include('userpost')
					
                </div>
            </div>
        </div>
		
    </div>
</div>

@endsection
