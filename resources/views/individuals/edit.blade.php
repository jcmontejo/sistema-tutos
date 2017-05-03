@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($individual, ['route' => ['individuals.update', $individual->id], 'method' => 'patch']) !!}

        @include('individuals.fields')

    {!! Form::close() !!}
</div>
@endsection
