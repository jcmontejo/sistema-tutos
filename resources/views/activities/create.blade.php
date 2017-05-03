@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'activities.store', 'files' => true]) !!}

        @include('activities.fields')

    {!! Form::close() !!}
</div>
@endsection
