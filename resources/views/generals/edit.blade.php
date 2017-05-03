@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($general, ['route' => ['generals.update', $general->id], 'method' => 'patch']) !!}

        @include('generals.fields-edit')

    {!! Form::close() !!}
</div>
@endsection
