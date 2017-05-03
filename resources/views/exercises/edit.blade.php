@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($exercise, ['route' => ['exercises.update', $exercise->id], 'method' => 'patch']) !!}

        @include('exercises.fields')

    {!! Form::close() !!}
</div>
@endsection
