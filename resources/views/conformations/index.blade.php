@extends('layouts.app')

@section('main-content')

<div class="container">

    @include('sweet::alert')

    <div class="row">
        <h1 class="pull-left">Actas de Conformación</h1>
        <a class="btn uppercase btn-default pull-right" style="margin-top: 25px" href="{!! route('conformations.create') !!}">Agregar nueva</a>
    </div>

    <div class="row">
        @if($conformations->isEmpty())
        <div class="well text-center">No actas registradas.</div>
        @else
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <th>Cuerpo</th>
                <th width="400px">Acción</th>
                <th></th>
            </thead>
            <tbody>

                @foreach($conformations as $conformation)
                <tr>
                    <td>{!! str_limit($conformation->body) !!}</td>
                    <td>
                        <a href="{!! route('conformations.edit', [$conformation->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('conformations.delete', [$conformation->id]) !!}" onclick="return confirm('Are you sure wants to delete this Conformation?')"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>
                    <td style="vertical-align: middle;" ><div class="btn-group">
                    <a  class="btn uppercase btn-warning" href="{{url('conformation',[$conformation->id])}}">Descargar<i class="glyphicon glyphicon-floppy-save" title="Desactivar"></i></a>
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