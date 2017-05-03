@extends('layouts.app')

@section('main-content')

<div class="container">

    @include('sweet::alert')

    <div class="row">
        <h1 class="pull-left">Alumnos Asesorados</h1>
        <!--<a class="btn uppercase btn-primary pull-right" style="margin-top: 25px" href="{!! route('students.create') !!}">Agregar Nuevo</a>-->
    </div>

    <div class="row">
        @if($students->isEmpty())
        <div class="well text-center">No hay ningun alumno registrado.</div>
        @else
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <th width="30px">Nombre</th>
                    <th width="30px">Correo Electronico</th>
                    <th width="10px">Grupo</th>
                    <th width="20px"></th>
                    <th width="20px"></th>
                    <th width="20px"></th>
                </thead>
                <tbody>

                    @foreach($students as $student)
                    <tr>
                        <td>{!! $student->fullname !!}</td>
                        <td>{!! $student->email !!}</td>
                        <td>{!! $student->group !!}</td>
                        <td style="vertical-align: middle;" ><div class="btn-group">
                            <a  class="btn uppercase btn-warning" href="{!! route('add.task', [$student->id]) !!}">Agregar tarea<i class="glyphicon glyphicon-floppy-disk" title="Desactivar"></i></a>
                        </div>

                    </td>
                    </td>
                    <td style="vertical-align: middle;" ><div class="btn-group">
                        <a  class="btn uppercase btn-warning" href="{!! route('add.comment', [$student->id]) !!}">Agregar comentario<i class="glyphicon glyphicon-comment" title="Desactivar"></i></a>
                    </div>
                    </td>
                    <td style="vertical-align: middle;" ><div class="btn-group">
                        <a  class="btn uppercase btn-warning" href="{!! route('view.tasksend', [$student->id]) !!}">Ver tareas enviadas<i class="glyphicon glyphicon-comment" title="Desactivar"></i></a>
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