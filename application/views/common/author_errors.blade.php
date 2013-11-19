@if ($errors->has())

	{{ $errors->first('name','<li>:message</li>') }}
	{{ $errors->first('bio','<li>:message</li>') }}
@endif