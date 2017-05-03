@extends('layouts.app')

@section('main-content')

<div class="container">

    @include('sweet::alert')

    <div class="row">
        <h1 class="pull-left">Periodos registrados</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('periods.create') !!}">Agregar nuevo</a>
    </div>

    <div class="row">
        @if($periods->isEmpty())
        <div class="well text-center">No hay Periodos registrados.</div>
        @else
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <th>Nombre</th>
                <th>Inicio de Periodo</th>
                <th>Termino Periodo</th>
                <th>Status</th>
                <th width="50px">Action</th>
                <th></th>
            </thead>
            <tbody>

                @foreach($periods as $period)
                <tr>
                    <td>{!! $period->name !!}</td>
                    <td>{!! $period->start_period !!}</td>
                    <td>{!! $period->end_period !!}</td>
                    <td>{!! $period->status !!}</td>
                    <td>
                        <a href="{!! route('periods.edit', [$period->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('periods.delete', [$period->id]) !!}" onclick="return confirm('Are you sure wants to delete this Period?')"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>
                    <td style="vertical-align: middle;" ><div class="btn-group">
                    @if($period->status === 'Inactivo')
                    <a  class="btn uppercase btn-warning" href="{!! route('activate.period', [$period->id]) !!}">Activar <i class="glyphicon glyphicon-edit" title="Activar"></i></a>
                    @else
                        <a  class="btn uppercase btn-danger" href="{!! route('desactivate.period', [$period->id]) !!}" onclick="return confirm('¿Estas seguro de que deseas desactivar el periodo?')">Desactivar <i class="glyphicon glyphicon-trash" title="Desactivar"></i></a>
                    @endif
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