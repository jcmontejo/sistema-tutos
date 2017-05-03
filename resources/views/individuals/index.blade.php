@extends('layouts.app')

@section('main-content')

<div class="container">

@include('sweet::alert')

    <div class="row">
        <h1 class="pull-left">Programa Individual</h1>
        <a class="btn uppercase btn-default pull-right" style="margin-top: 25px" href="{!! route('individuals.create') !!}">Agregar nuevo programa individual</a>
    </div>

    <div class="row">
        @if($individuals->isEmpty())
        <div class="well text-center">No hay programas individuales creados.</div>
        @else
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <th width="10px">Alumnos Atendidos</th>
                <th width="10px">Semestre</th>
                <th width="10px">Elaboraron</th>
                <th>vobo</th>
                <th width="50px">Acción</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>

                @foreach($individuals as $individual)
                <tr>
                    <td>{!! $individual->students_attended !!}</td>
                    <td>{!! $individual->semester !!}</td>
                    <td>{!! $individual->elaboration !!}</td>
                    <td>{!! $individual->vobo !!}</td>
                    <td>
                        <a href="{!! route('individuals.edit', [$individual->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('individuals.delete', [$individual->id]) !!}" onclick="return confirm('Are you sure wants to delete this Individual?')"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>
                    <td style="vertical-align: middle;" >
                        <div class="btn-group">

                            <a  class="btn uppercase btn-warning" href="{!! route('add.itemindividual', [$individual->id]) !!}">Agregar<i class="glyphicon glyphicon-edit" title="Activar"></i></a>
                        </div>

                    </td>
                    <td style="vertical-align: middle;" ><div class="btn-group">
                    <a  class="btn uppercase btn-warning" href="{{url('individualreport',[$individual->id])}}">Descargar<i class="glyphicon glyphicon-floppy-save" title="Desactivar"></i></a>
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