@layout("layouts.default")
@section('content')

<ul>
	<li>{{  HTML::link_to_route('authors',"Home")  }}</li>
	

@if ($errors->has())

	{{ $errors->first('name','<li>:message</li>') }}
	{{ $errors->first('bio','<li>:message</li>') }}
</ul>
@endif
<h1>Add New Authorr</h1>
{{ Form::open('authors/create','POST') }}
{{ Form::token() }}

<p>
	{{ Form::label('name','Name of Author') }}<br />	
	{{ Form::text('name',Input::old('name')) }}<br />
	{{ Form::label('bio','Biography of Author') }}<br />	
	{{ Form::textarea('bio',Input::old('bio')) }}<br />
	
</p>
<p>
	{{ Form::submit('Add Author') }}
</p>
{{ Form::close() }}

@endsection
