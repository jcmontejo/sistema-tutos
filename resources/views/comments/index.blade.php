@extends('layouts.app')

@section('main-content')

<div class="container">

    @include('sweet::alert')

    <div class="row">
        <h1 class="pull-left">Comentarios realizados</h1>
    </div>

    <div class="row">
        @if($comments->isEmpty())
        <div class="well text-center">No hay comentarios en nuestros registros.</div>
        @else
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <th>Titulo</th>
                <th>Cuerpo del mensaje</th>
            </thead>
            <tbody>

                @foreach($comments as $comment)
                <tr>
                    <td>{!! $comment->name !!}</td>
                    <td>{!! $comment->body !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection