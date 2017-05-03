@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'items.store']) !!}

        @include('items.fields')

    {!! Form::close() !!}
</div>
@endsection
