@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')
	@include('sweet::alert')
    {!! Form::open(['route' => 'tasks.store']) !!}

        @include('tasks.fields')

    {!! Form::close() !!}
</div>
@endsection
