@extends('layouts.app')

@section('main-content')

<div class="container">

@include('sweet::alert')

    <div class="row">
        <h1 class="pull-left">Sesiones de {{$tutor->name}} {{$tutor->father_last_name}}</h1>
    </div>

    <div class="row">
        @if($lessons->isEmpty())
        <div class="well text-center">No hay sesiones guardadas.</div>
        @else
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <th>Fecha</th>
                <th>Hora</th>
            </thead>
            <tbody>

                @foreach($lessons as $lesson)
                <tr>
                    <td>{!! $lesson->date !!}</td>
                    <td>{!! $lesson->hora !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection