@extends('layouts.app')

@section('main-content')

<div class="container">

    @include('sweet::alert')

    <div class="row">
        <h1 class="pull-left">Tutores</h1>
        <!--<a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('tutors.create') !!}">Agregar Nuevo</a>-->
    </div>

    <div class="row">
        @if($tutors->isEmpty())
        <div class="well text-center">No hay Tutores registrados.</div>
        @else
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo Electronico</th>
                <th>Titulo Academico</th>
                <th width="50px">Acción</th>
                <th></th>
            </thead>
            <tbody>

                @foreach($tutors as $tutors)
                <tr>
                    <td>{!! $tutors->name !!}</td>
                    <td>{!! $tutors->father_last_name !!}</td>
                    <td>{!! $tutors->mother_last_name !!}</td>
                    <td>{!! $tutors->email !!}</td>
                    <td>{!! $tutors->academic_title !!}</td>
                    <td>
                        <a href="{!! route('tutors.edit', [$tutors->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('tutors.delete', [$tutors->id]) !!}" onclick="return confirm('Are you sure wants to delete this Tutors?')"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>
                    <!--<td style="vertical-align: middle;" ><div class="btn-group">
                    <a  class="btn uppercase btn-warning" href="#">Reporte <i class="glyphicon glyphicon-list-alt" title="Desactivar"></i></a>
                    </div>-->

                </td>
                <td style="vertical-align: middle;" ><div class="btn-group">
                    <a  class="btn uppercase btn-warning" href="{!! route('view.lessons', [$tutors->id]) !!}">Sesiones <i class="glyphicon glyphicon-check" title="Desactivar"></i></a>
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