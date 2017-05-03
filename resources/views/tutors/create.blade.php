@extends('layouts.app')

@section('main-content')
<div class="container">
	
    @include('common.errors')

    {!! Form::open(['route' => 'tutors.store']) !!}

        @include('tutors.fields')

    {!! Form::close() !!}
</div>
@endsection
