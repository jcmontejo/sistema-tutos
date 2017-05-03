@extends('layouts.app')

@section('main-content')

<div class="container">

@include('sweet::alert')

    <div class="row">
        <h1 class="pull-left">Itemindividuals</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('itemindividuals.create') !!}">Add New</a>
    </div>

    <div class="row">
        @if($itemindividuals->isEmpty())
        <div class="well text-center">No Itemindividuals found.</div>
        @else
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <th>Activities</th>
                <th>Date</th>
                <th>Resources</th>
                <th>Evidence</th>
                <th width="50px">Action</th>
            </thead>
            <tbody>

                @foreach($itemindividuals as $itemindividual)
                <tr>
                    <td>{!! $itemindividual->activities !!}</td>
                    <td>{!! $itemindividual->date !!}</td>
                    <td>{!! $itemindividual->resources !!}</td>
                    <td>{!! $itemindividual->evidence !!}</td>
                    <td>
                        <a href="{!! route('itemindividuals.edit', [$itemindividual->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('itemindividuals.delete', [$itemindividual->id]) !!}" onclick="return confirm('Are you sure wants to delete this Itemindividual?')"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection