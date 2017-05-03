@extends('layouts.app')

@section('main-content')

<div class="container">

    @include('sweet::alert')

    <div class="row">
        <h1 class="pull-left">Actividades</h1>
        <a class="btn uppercase btn-default pull-right" style="margin-top: 25px" href="{!! route('activities.create') !!}">Agregar nueva actividad</a>
    </div>

    <div class="row">
        @if($activities->isEmpty())
        <div class="well text-center">No hay Actividades registradas.</div>
        @else
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <th>Titulo</th>
                <th>Imagen </th>
                <th>Link a Actividad</th>
                <th width="50px">Acción</th>
                <th>Activar / Desactivar</th>
            </thead>
            <tbody>
               
                @foreach($activities as $activity)
                <tr>
                    <td>{!! $activity->title !!}</td>
                    <td><img src="{{asset('/uploads/activities/')}}/{{ $activity->image }}" alt=""></td>
                    <td><a target="_blank" href="{{ $activity->link_to_activity }}">Ir al LINK</a></td>
                    <td>
                        <a href="{!! route('activities.edit', [$activity->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('activities.delete', [$activity->id]) !!}" onclick="return confirm('Are you sure wants to delete this Activity?')"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>
                    <td style="vertical-align: middle;" ><div class="btn-group">
                    @if($activity->status === 'Inactivo')
                    <a  class="btn uppercase btn-warning" href="{!! route('activate.activity', [$activity->id]) !!}">Activar <i class="glyphicon glyphicon-edit" title="Activar"></i></a>
                    @else
                        <a  class="btn uppercase btn-danger" href="{!! route('desactivate.activity', [$activity->id]) !!}" onclick="return confirm('¿Estas seguro de que deseas desactivar el periodo?')">Desactivar <i class="glyphicon glyphicon-trash" title="Desactivar"></i></a>
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