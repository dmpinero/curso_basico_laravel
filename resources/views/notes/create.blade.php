@extends('layout')

@section('content')
	<h1>Create a note</h1>

	@include('partials/errors')

	<form method="POST" class="form" action="{{ url('notes') }}">
		{!! csrf_field() !!}
		
		<textarea name="note" class="form-control" placeholder="Write your note here...">{{ old('note') }} </textarea>
		<button type="submit" class="btn btn-primary">Create a note</button>
	</form>
@endsection