@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
	
        <div class="col-md-6">
            
                				
					@include('components.rss')
					@include('components.rss2')
					
                </div>
            </div>
        </div>
		
   @endsection
