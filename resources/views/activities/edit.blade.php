@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($activity, ['route' => ['activities.update', $activity->id], 'method' => 'patch']) !!}

        @include('activities.fields')

    {!! Form::close() !!}
</div>
@endsection
