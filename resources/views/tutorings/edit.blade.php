@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($tutoring, ['route' => ['tutorings.update', $tutoring->id], 'method' => 'patch']) !!}

        @include('tutorings.fields-edit')

    {!! Form::close() !!}
</div>
@endsection
