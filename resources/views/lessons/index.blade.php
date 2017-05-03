@extends('layouts.app')

@section('main-content')

<div class="container">

@include('sweet::alert')

    <div class="row">
        <h1 class="pull-left">Sesiones Guardadas</h1>
        <a class="btn uppercase btn-default pull-right" style="margin-top: 25px" href="{!! route('lessons.create') !!}">Agregar Nueva sesión</a>
    </div>

    <div class="row">
        @if($lessons->isEmpty())
        <div class="well text-center">No hay sesiones guardadas.</div>
        @else
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <th>Fecha</th>
                <th>Hora</th>
                <th width="50px">Acción</th>
            </thead>
            <tbody>

                @foreach($lessons as $lesson)
                <tr>
                    <td>{!! $lesson->date !!}</td>
                    <td>{!! $lesson->hora !!}</td>
                    <td>
                        <a href="{!! route('lessons.edit', [$lesson->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('lessons.delete', [$lesson->id]) !!}" onclick="return confirm('¿Seguro que deseas borrar esta sesión?')"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection