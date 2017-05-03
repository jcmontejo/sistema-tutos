@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'conformations.store']) !!}

        @include('conformations.fields')

    {!! Form::close() !!}
</div>
@endsection
