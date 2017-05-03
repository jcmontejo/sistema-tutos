@extends('layouts.app')

@section('main-content')

<div class="container">

    @include('sweet::alert')

    <div class="row">
        <h1 class="pull-left">informe del programa de Tutorías</h1>
        <a class="btn uppercase btn-default pull-right" style="margin-top: 25px" href="{!! route('tutorialreports.create') !!}">Agregar nuevo informe</a>
    </div>

    <div class="row">
        @if($tutorialreports->isEmpty())
        <div class="well text-center">No hay informes en nuestro registros.</div>
        @else
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <th>Students Attended</th>
                <th>Campus</th>
                <th>Semester</th>
                <th>Turn</th>
                <th>Docent</th>
                <th>Date</th>
                <th>Problematic</th>
                <th>Vobo</th>
                <th width="50px">Action</th>
                <th></th>
            </thead>
            <tbody>
               
                @foreach($tutorialreports as $tutorialreport)
                <tr>
                    <td>{!! $tutorialreport->students_attended !!}</td>
                    <td>{!! $tutorialreport->campus !!}</td>
                    <td>{!! $tutorialreport->semester !!}</td>
                    <td>{!! $tutorialreport->turn !!}</td>
                    <td>{!! $tutorialreport->docent !!}</td>
                    <td>{!! $tutorialreport->date !!}</td>
                    <td>{!! $tutorialreport->problematic !!}</td>
                    <td>{!! $tutorialreport->vobo !!}</td>
                    <td>
                        <a href="{!! route('tutorialreports.edit', [$tutorialreport->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('tutorialreports.delete', [$tutorialreport->id]) !!}" onclick="return confirm('Are you sure wants to delete this Tutorialreport?')"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>
                    <td style="vertical-align: middle;" ><div class="btn-group">
                    <a  class="btn uppercase btn-warning" href="{{url('tutorialreport',[$tutorialreport->id])}}">Descargar<i class="glyphicon glyphicon-floppy-save" title="Desactivar"></i></a>
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