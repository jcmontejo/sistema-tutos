@extends('layouts.app')

@section('main-content')

<div class="container">

    @include('sweet::alert')

    <div class="row">
        <h1 class="pull-left">Informe Final de Tutorias</h1>
        <a class="btn uppercase btn-default pull-right" style="margin-top: 25px" href="{!! route('finalreports.create') !!}">Agregar reporte</a>
    </div>

    <div class="row">
        @if($finalreports->isEmpty())
        <div class="well text-center">No hay ningun reporte final de tutorias creado.</div>
        @else
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <th>Alumnos Atendidos</th>
                <th>Ciclo Escolar</th>
                <th>Turno</th>
                <th>Fecha de Elaboración</th>
                <th>elaborado por</th>
                <th width="50px">Acción</th>
                <th></th>
            </thead>
            <tbody>

                @foreach($finalreports as $finalreport)
                <tr>
                    <td>{!! $finalreport->students_attended !!}</td>
                    <td>{!! $finalreport->school_cycle !!}</td>
                    <td>{!! $finalreport->turn !!}</td>
                    <td>{!! $finalreport->date !!}</td>
                    <td>{!! str_limit($finalreport->elaboration, 20) !!}</td>
                    <td>
                        <a href="{!! route('finalreports.edit', [$finalreport->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('finalreports.delete', [$finalreport->id]) !!}" onclick="return confirm('Are you sure wants to delete this Finalreport?')"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>
                    <td style="vertical-align: middle;" ><div class="btn-group">
                    <a  class="btn uppercase btn-warning" href="{{url('finalreport',[$finalreport->id])}}">Descargar<i class="glyphicon glyphicon-floppy-save" title="Desactivar"></i></a>
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