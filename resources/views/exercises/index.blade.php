@extends('layouts.app')

@section('main-content')

    <div class="container">

        @include('sweet::alert')

        <div class="row">
            <h1 class="pull-left">Exercises</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('exercises.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($exercises->isEmpty())
                <div class="well text-center">No Exercises found.</div>
            @else
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <th>Name</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($exercises as $exercise)
                        <tr>
                            <td>{!! $exercise->name !!}</td>
                            <td>
                                <a href="{!! route('exercises.edit', [$exercise->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('exercises.delete', [$exercise->id]) !!}" onclick="return confirm('Are you sure wants to delete this Exercise?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection