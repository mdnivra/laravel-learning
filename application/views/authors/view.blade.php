@layout("layouts.default")
@section('content')

<ul>
	<li>{{ HTML::link_to_route('authors',"Home") }}</li>
	@foreach($authors as $var)
		<li>{{ HTML::link_to_route('author',$var->name, $var->id) }}</li>
	@endforeach
</ul>

<h1>{{$author->name}}</h1>
<p>{{$author->bio}} </p>
<p>{{$author->updated_at}} </p>

	<h2> {{  HTML::link_to_route('edit_author',"Edit Info",array($author->id))  }}</h2>
	<h2>
		{{ Form::open('authors/delete','DELETE') }}
			{{ Form::hidden('id',$author->id) }}

			{{ Form::submit('DELETE') }}
		{{ Form::close() }}


	</h2>
@endsection
