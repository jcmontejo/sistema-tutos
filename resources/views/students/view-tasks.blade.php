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
        <div class="well text-center">No hay tareas para tí en nuestros registros.</div>
        @else
        <table class="table" id="myTable">
            <thead>
                <th>Tipo de Tarea</th>
                <th>Nombre de la Tarea</th>
                <th>Descripción</th>
                <th>Fecha de Entrega</th>
                <th width="50px">Acción</th>
            </thead>
            <tbody>

                @foreach($tasks as $task)
                <tr>
                    <td>{!! $task->type !!}</td>
                    <td>{!! $task->name !!}</td>
                    <td>{!! $task->description !!}</td>
                    <td>{!! $task->date_delivery !!}</td>
                    <td style="vertical-align: middle;" ><div class="btn-group">
                        <a  class="btn uppercase btn-warning" href="{!! route('send.task', [$task->id]) !!}">Subir Archivo<i class="glyphicon glyphicon-arrow-up" title="Desactivar"></i></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
</div>
@endsection