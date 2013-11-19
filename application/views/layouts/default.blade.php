<!DOCTYPE HTML>
<html>
	<title>{{$title}}</title>
	<head>
	</head>
	<body>
		@if(Session::has('message'))
		<p style="color:green;">{{ Session::get("message") }}<p>
		@endif
		<p></P>
		<div>
		</div>
		@yield("content");
	</body>
</html>