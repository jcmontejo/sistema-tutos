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
                    <th>Nombre</th>
                    <th>Grupo</th>
                    <th width="50px"></th>
                </thead>
                <tbody>

                    @foreach($students as $student)
                    <tr>
                        <td>{!! $student->fullname !!}</td>
                        <td>{!! $student->group !!}</td>
                    </td>
                    <td style="vertical-align: middle;" ><div class="btn-group">
                        <a  class="btn uppercase btn-warning" href="{!! route('add.addexercise', [$student->id]) !!}">Agregar actividades<i class="glyphicon glyphicon-send" title="Desactivar"></i></a>
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