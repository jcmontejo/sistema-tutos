@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'news.store']) !!}

        @include('news.fields')

    {!! Form::close() !!}
</div>
@endsection
