@extends('layouts.app')

@section('main-content')
<div class="container">
	@include('sweet::alert')
	@include('common.errors')
	{!! Form::open(['url' => 'apply/upload', 'files' => true]) !!}
	<label for="">Subir Tarea</label>
	<input type="file" name="task">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="task_id" value="{{ $task->id }}">
	<br>
	<input type="submit" class="uppercase btn btn-default" value="Subir Archivo">
	{!! Form::close() !!}
</div>
@endsection
