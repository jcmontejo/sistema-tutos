@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($period, ['route' => ['periods.update', $period->id], 'method' => 'patch']) !!}

        @include('periods.fields')

    {!! Form::close() !!}
</div>
@endsection
