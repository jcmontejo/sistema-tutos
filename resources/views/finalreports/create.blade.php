@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'finalreports.store']) !!}

        @include('finalreports.fields')

    {!! Form::close() !!}
</div>
@endsection
