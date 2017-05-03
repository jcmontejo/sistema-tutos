@extends('layouts.app')

@section('main-content')

<div class="container">

    @include('flash::message')

    <div class="row">
        <h1 class="pull-left">Items</h1>
        <a class="btn uppercase btn-default pull-right" style="margin-top: 25px" href="{!! route('items.create') !!}">Add New</a>
    </div>

    <div class="row">
        @if($items->isEmpty())
        <div class="well text-center">No Items found.</div>
        @else
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <th>Theme</th>
                <th>Activity</th>
                <th>Objective</th>
                <th>Resources</th>
                <th>Schedule</th>
                <th>Evaluation And Follow</th>
                <th width="50px">Action</th>
            </thead>
            <tbody>
               
                @foreach($items as $item)
                <tr>
                    <td>{!! $item->theme !!}</td>
                    <td>{!! $item->activity !!}</td>
                    <td>{!! $item->objective !!}</td>
                    <td>{!! $item->resources !!}</td>
                    <td>{!! $item->schedule !!}</td>
                    <td>{!! $item->evaluation_and_follow !!}</td>
                    <td>
                        <a href="{!! route('items.edit', [$item->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('items.delete', [$item->id]) !!}" onclick="return confirm('Are you sure wants to delete this Item?')"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection