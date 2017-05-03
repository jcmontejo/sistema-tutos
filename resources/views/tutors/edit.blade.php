@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($tutors, ['route' => ['tutors.update', $tutors->id], 'method' => 'patch']) !!}

        @include('tutors.fields')

    {!! Form::close() !!}
</div>
@endsection
