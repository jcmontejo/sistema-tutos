@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'patch']) !!}

        @include('tasks.fields')

    {!! Form::close() !!}
</div>
@endsection
