@layout("layouts.default")
@section('content')


<h1>test</h1>

@endsection
<ul>
	<li>{{ HTML::link_to_route('new_author',"Add New Author") }}</li>

	@foreach($authors as $author)
		<li>{{ HTML::link_to_route('author',$author->name, $author->id) }}</li>
	@endforeach
</ul>