@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($conformation, ['route' => ['conformations.update', $conformation->id], 'method' => 'patch']) !!}

        @include('conformations.fields')

    {!! Form::close() !!}
</div>
@endsection
