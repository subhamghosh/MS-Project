<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<style>
	
	</style>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	@yield('css')
</head>
	<body>
				

		<div id="app">
		
	  <!-- nav links here -->   
				 
			@include('components.navbar')  

			@yield('content')
		</div>
		
		
		<div class="content">                
						<div class="jumbotron">
						  <div class="container text-center">
							<h1 style="color:red;">  University of Central Missouri </h1>
							<h3>Online Classified & Student Forum</h3>      
							<p style="color:red;">Dept of CIS</p>
						  </div>
						</div>
			<br>  
		</div>
		
		<div class="container">
			@include('components.wcimage')
		</div>
		
		<br>
		<br>
		<br>
		<br>
		
		@include('components.footer')
		@yield('js')
			<!-- Scripts -->
		<script src="{{ asset('js/app.js') }}"></script>
	</body>
</html>
