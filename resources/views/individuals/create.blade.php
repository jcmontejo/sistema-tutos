@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'individuals.store']) !!}

        @include('individuals.fields')

    {!! Form::close() !!}
</div>
@endsection
