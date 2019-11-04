<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title> @yield('title','eCommerce') </title>
	@include('includes.styles')
</head>
<body>
	@header

	<div class="container">
		@yield('content')
		<div class="col-lg-12 my-4">
		 
		</div>
		<div class="col-lg-12 my-4">
			 
		</div>
	</div>

	@footer

	@include('includes.scripts')
	<script type="text/javascript">
		@yield('scripts')
	</script>
</body>
</html>