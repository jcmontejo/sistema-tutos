@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'directors.store']) !!}

        @include('directors.fields')

    {!! Form::close() !!}
</div>
@endsection
