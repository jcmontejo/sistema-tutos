@extends('layouts.app')

@section('main-content')

<div class="container">

    @include('sweet::alert')

    <div class="row">
        <h1 class="pull-left">Programa General</h1>
        <a class="btn uppercase btn-default pull-right" style="margin-top: 25px" href="{!! route('generals.create') !!}">Agregar nuevo programa</a>
    </div>

    <div class="row">
        @if($generals->isEmpty())
        <div class="well text-center">No hay programas registrados.</div>
        @else
        
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <th>Alumnos Atendidos</th>
                <th>Ciclo Escolar</th>
                <th>Plantel</th>
                <th>Turno</th>
                <th>Objetivo General</th>
                <th>Elaboraron</th>
                <th width="50px">Action</th>
                <th>Agregar item</th>
                <th></th>
            </thead>
            <tbody>

                @foreach($generals as $general)
                <tr>
                    <td>{!! $general->students_attended !!}</td>
                    <td>{!! $general->school_cycle !!}</td>
                    <td>{!! $general->campus !!}</td>
                    <td>{!! $general->turn !!}</td>
                    <td>{!! str_limit($general->general_objective) !!}</td>
                    <td>{!! str_limit($general->elaboration, 20) !!}</td>
                    <td>
                        <a href="{!! route('generals.edit', [$general->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('generals.delete', [$general->id]) !!}" onclick="return confirm('¿Estas seguro de querer eliminar este registro?')"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>
                    <td style="vertical-align: middle;" >
                        <div class="btn-group">

                            <a  class="btn uppercase btn-warning" href="{!! route('add.item', [$general->id]) !!}">Agregar<i class="glyphicon glyphicon-edit" title="Activar"></i></a>
                        </div>

                    </td>
                    <td style="vertical-align: middle;" ><div class="btn-group">
                    <a  class="btn uppercase btn-warning" href="{{url('generalreport',[$general->id])}}">Descargar<i class="glyphicon glyphicon-floppy-save" title="Desactivar"></i></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif

</div>
@endsection