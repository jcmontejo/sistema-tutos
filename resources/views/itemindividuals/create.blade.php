@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'itemindividuals.store']) !!}

        @include('itemindividuals.fields')

    {!! Form::close() !!}
</div>
@endsection
