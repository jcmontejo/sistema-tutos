@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($news, ['route' => ['news.update', $news->id], 'method' => 'patch']) !!}

        @include('news.fields')

    {!! Form::close() !!}
</div>
@endsection
