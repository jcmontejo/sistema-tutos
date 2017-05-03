@extends('layouts.app')

@section('main-content')

<div class="container">

    @include('sweet::alert')

    <div class="row">
        <h1 class="pull-left">Coordinadores</h1>
        <a class="btn uppercase btn-default pull-right" style="margin-top: 25px" href="{!! route('directors.create') !!}">Agregar Nuevo</a>
    </div>

    <div class="row">
        @if($directors->isEmpty())
        <div class="well text-center">No hay Cordinadores registrados.</div>
        @else
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo electronico</th>
                <th>Titulo Academico</th>s
                <th width="50px">Acción</th>
            </thead>
            <tbody>
             
                @foreach($directors as $directors)
                <tr>
                    <td>{!! $directors->name !!}</td>
                    <td>{!! $directors->father_last_name !!}</td>
                    <td>{!! $directors->mother_last_name !!}</td>
                    <td>{!! $directors->email !!}</td>
                    <td>{!! $directors->academic_title !!}</td>
                    <td>
                        <a href="{!! route('directors.edit', [$directors->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('directors.delete', [$directors->id]) !!}" onclick="return confirm('Are you sure wants to delete this Directors?')"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection