@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($itemindividual, ['route' => ['itemindividuals.update', $itemindividual->id], 'method' => 'patch']) !!}

        @include('itemindividuals.fields')

    {!! Form::close() !!}
</div>
@endsection
