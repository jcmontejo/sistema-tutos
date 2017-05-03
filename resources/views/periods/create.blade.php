@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'periods.store']) !!}

        @include('periods.fields')

    {!! Form::close() !!}
</div>
@endsection
