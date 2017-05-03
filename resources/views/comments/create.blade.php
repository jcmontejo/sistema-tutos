@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'comments.store']) !!}

        @include('comments.fields')

    {!! Form::close() !!}
</div>
@endsection
