@extends('layouts.app')

@section('main-content')

<div class="container">

    @include('sweet::alert')

    <div class="row">
        <h1 class="pull-left">Programa de Tutorías</h1>
        <a class="btn uppercase btn-default pull-right" style="margin-top: 25px" href="{!! route('tutorings.create') !!}">Agregar nuevo programa de Tutorias</a>
    </div>

    <div class="row">
        @if($tutorings->isEmpty())
        <div class="well text-center">No hay ningún programa de tutorías creado.</div>
        @else
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <th>Ciclo Escolar</th>
                <th>Plantel</th>
                <th>Fecha de elaboración</th>
                <th>Elaborarón</th>
                <th>Vobo</th>
                <th width="50px">Acción</th>
                <th></th>
            </thead>
            <tbody>

                @foreach($tutorings as $tutoring)
                <tr>
                    <td>{!! $tutoring->school_cycle !!}</td>
                    <td>{!! $tutoring->campus !!}</td>
                    <td>{!! $tutoring->date !!}</td>
                    <td>{!! str_limit($tutoring->elaboration, 20) !!}</td>
                    <td>{!! str_limit($tutoring->vobo, 20) !!}</td>
                    <td>
                        <a href="{!! route('tutorings.edit', [$tutoring->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('tutorings.delete', [$tutoring->id]) !!}" onclick="return confirm('Are you sure wants to delete this Tutoring?')"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>
                    <td style="vertical-align: middle;" ><div class="btn-group">
                    <a  class="btn uppercase btn-warning" href="{{url('tutoring',[$tutoring->id])}}">Descargar<i class="glyphicon glyphicon-floppy-save" title="Desactivar"></i></a>
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