@extends('layouts.app')

@section('main-content')
<div class="container">
	<h1>Asunto: {{ $comment->name }}</h1>

    <div class="jumbotron text-center">
    	<h2>Mensaje:</h2>
        <p>
            {!! $comment->body !!}
        </p>
    </div>

</div>
@endsection
