@layout("layouts.default")

@section('content')
<ul>
	<li>{{  HTML::link_to_route('authors',"Home")  }}</li>
	{{ render('common.author_errors') }}


</ul>

<h1>Edit {{$author->name}}</h1>
{{ Form::open('authors/update','PUT') }}

{{ Form::token() }}

<p>
	{{ Form::label('name','Name of Author') }}<br />	
	{{ Form::text('name',$author->name) }}<br />
	{{ Form::label('bio','Biography of Author') }}<br />	
	{{ Form::textarea('bio',$author->bio) }}<br />
	
</p>
<p>
	{{ Form::hidden('id',$author->id) }}
	{{ Form::submit( "UPDATE AUTHOR") }}
</p>
{{ Form::close() }}

@endsection