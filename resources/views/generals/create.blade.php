@extends('layouts.app')

@section('main-content')
<div class="container">
	
    @include('common.errors')

    {!! Form::open(['route' => 'generals.store']) !!}

        @include('generals.fields')

    {!! Form::close() !!}
</div>
@endsection
