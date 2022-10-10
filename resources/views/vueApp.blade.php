<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<mete name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Laravel') }}</title>
	<!-- style -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<div class="container">
		<h1> Vuejs crud</h1>
	</div>
	<section id="app">
		<router-view></router-view>
	</section>
	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

</body>
</html>