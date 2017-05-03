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
        <div class="well text-center">No Tasks found.</div>
        @else
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <th>Tipo de Tarea</th>
                <th>Nombre de la Tarea</th>
                <th>Descripción</th>
                <th>Fecha de Entrega</th>
                <th width="50px">Action</th>
            </thead>
            <tbody>

                @foreach($tasks as $task)
                <tr>
                    <td>{!! $task->type !!}</td>
                    <td>{!! $task->name !!}</td>
                    <td>{!! $task->description !!}</td>
                    <td>{!! $task->date_delivery !!}</td>
                    <td>
                        <a href="{!! route('tasks.edit', [$task->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('tasks.delete', [$task->id]) !!}" onclick="return confirm('Are you sure wants to delete this Task?')"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection