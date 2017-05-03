@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($item, ['route' => ['items.update', $item->id], 'method' => 'patch']) !!}

        @include('items.fields')

    {!! Form::close() !!}
</div>
@endsection
