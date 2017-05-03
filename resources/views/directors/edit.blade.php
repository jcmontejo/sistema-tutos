@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($directors, ['route' => ['directors.update', $directors->id], 'method' => 'patch']) !!}

        @include('directors.fields')

    {!! Form::close() !!}
</div>
@endsection
