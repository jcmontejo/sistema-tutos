@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($finalreport, ['route' => ['finalreports.update', $finalreport->id], 'method' => 'patch']) !!}

        @include('finalreports.fields-edit')

    {!! Form::close() !!}
</div>
@endsection
