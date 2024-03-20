<!DOCTYPE HTML>
<html>
	<head>
		@vite(['resources/css/app.css','resources/js/app.css','resources/css/fontawesome.css'])
		<title>@yield('tittle')</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	</head>
	<body class="homepage is-preload">
	
		@yield('content')
			
	</body>
</html>
