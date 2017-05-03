@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')
	@include('sweet::alert')
    {!! Form::open(['route' => 'exercises.store']) !!}

        @include('exercises.fields')

    {!! Form::close() !!}
</div>
@endsection
