@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'tutorialreports.store']) !!}

        @include('tutorialreports.fields')

    {!! Form::close() !!}
</div>
@endsection
