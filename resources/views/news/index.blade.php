@extends('layouts.app')

@section('main-content')

<div class="container">

    @include('sweet::alert')

    <div class="row">
        <h1 class="pull-left">Noticias</h1>
        <a class="btn uppercase btn-default pull-right" style="margin-top: 25px" href="{!! route('news.create') !!}">Agregar Noticia</a>
    </div>

    <div class="row">
        @if($news->isEmpty())
        <div class="well text-center">No hay Noticias.</div>
        @else
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <th>Titulo</th>
                <!--<th>Link a PDF</th>-->
                <th width="50px">Acción</th>
                <th width="50px"></th>
            </thead>
            <tbody>

                @foreach($news as $news)
                <tr>
                    <td>{!! $news->title !!}</td>
                    <!--<td>{!! $news->link_to_pdf !!}</td>-->
                    <td>
                        <a href="{!! route('news.edit', [$news->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('news.delete', [$news->id]) !!}" onclick="return confirm('Are you sure wants to delete this News?')"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>
                    <td style="vertical-align: middle;" ><div class="btn-group">
                        @if($news->status === 'Inactivo')
                        <a  class="btn uppercase btn-warning" href="{!! route('activate.news', [$news->id]) !!}">Activar <i class="glyphicon glyphicon-edit" title="Activar"></i></a>
                        @else
                        <a  class="btn uppercase btn-danger" href="{!! route('desactivate.news', [$news->id]) !!}" onclick="return confirm('¿Estas seguro de que deseas desactivar el periodo?')">Desactivar <i class="glyphicon glyphicon-trash" title="Desactivar"></i></a>
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