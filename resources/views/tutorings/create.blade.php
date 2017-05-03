@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'tutorings.store']) !!}

        @include('tutorings.fields')

    {!! Form::close() !!}
</div>
@endsection
