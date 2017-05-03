@extends('layouts.app')

@section('main-content')

<div class="container">

    @include('sweet::alert')

    <div class="row">
        <h1 class="pull-left">Tareas</h1>
        <!--<a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('tasks.create') !!}">Add New</a>-->
    </div>

    <div class="row">
        @if($tasks->isEmpty())
        <div class="well text-center">No hay tareas para este alumno en nuestros registros.</div>
        @else
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <th>Tipo de Tarea</th>
                <th>Nombre de la Tarea</th>
                <th>Descripción</th>
                <th>Fecha de Entrega</th>
                <th>Archivo</th>
            </thead>
            <tbody>

                @foreach($tasks as $task)
                <tr>
                    <td>{!! $task->type !!}</td>
                    <td>{!! $task->name !!}</td>
                    <td>{!! $task->description !!}</td>
                    <td>{!! $task->date_delivery !!}</td>
                    @if(empty($task->file))
                    <td>No hay archivo para descargar</td>
                    @else
                    <td><a target="pdf-frame" class="btn uppercase btn-warning" href="{{asset('/uploads/tasks/')}}/{!! $task->file !!}" download>Descargar<i class="glyphicon glyphicon-floppy-save" title="Desactivar"></i>
                    </a></td>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
</div>
@endsection