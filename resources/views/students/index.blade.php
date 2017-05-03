@extends('layouts.app')

@section('main-content')

<div class="container">

    @include('sweet::alert')

    <div class="row">
        <h1 class="pull-left">Alumnos</h1>
        <!--<a class="btn uppercase btn-primary pull-right" style="margin-top: 25px" href="{!! route('students.create') !!}">Agregar Nuevo</a>-->
    </div>

    <div class="row">
        @if($students->isEmpty())
        <div class="well text-center">No hay ningun alumno registrado.</div>
        @else
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Correo Electronico</th>
                    <th>Grado</th>
                    <th>Grupo</th>
                    <th>Turno</th>
                    <th width="50px">Acción</th>
                    <th></th>
                </thead>
                <tbody>

                    @foreach($students as $student)
                    <tr>
                        <td>{!! $student->name !!}</td>
                        <td>{!! $student->father_last_name !!}</td>
                        <td>{!! $student->mother_last_name !!}</td>
                        <td>{!! $student->email !!}</td>
                        <td>{!! $student->grade !!}</td>
                        <td>{!! $student->group !!}</td>
                        <td>{!! $student->turn !!}</td>
                        <td>
                            <a href="{!! route('students.edit', [$student->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="{!! route('students.delete', [$student->id]) !!}" onclick="return confirm('Are you sure wants to delete this Student?')"><i class="glyphicon glyphicon-remove"></i></a>
                        </td>
                        <td style="vertical-align: middle;" ><div class="btn-group">
                            <a  class="btn uppercase btn-warning" href="#">Reporte <i class="glyphicon glyphicon-list-alt" title="Desactivar"></i></a>
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
</div>
@endsection