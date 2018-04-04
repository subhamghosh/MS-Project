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
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="{{ asset('js/app.js') }}"></script>
	<style>
		.liked{
	 color:red;
 }
 .disliked{
	 color:red;
 }
	</style>
	@yield('css')
</head>
<body>
		<!-- 	background="images/admin/body.png" style="background-repeat:no-repeat;background-size:auto;"-->

    <div id="app">
	
  <!-- nav links here -->   
             
		@include('components.navbar')  

        @yield('content')
		
    </div>
@include('components.footer')

    <!-- Scripts -->
	@yield('js')	
	
</body>
</html>
