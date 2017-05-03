@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($tutorialreport, ['route' => ['tutorialreports.update', $tutorialreport->id], 'method' => 'patch']) !!}

        @include('tutorialreports.fields')

    {!! Form::close() !!}
</div>
@endsection
