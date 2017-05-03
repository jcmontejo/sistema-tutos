@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<img src="{{asset('/uploads/avatars/')}}/{{$user->avatar}}" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;" alt="">
				<h2>Perfil de {{ $user->name}}</h2>
				{!! Form::open(['url' => '/profile', 'files' => true]) !!}
				<label for="">Actualizar Imagen de Perfil</label>
				<input type="file" name="avatar">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="submit" class="pull-right btn btn-warning" value="Actualizar imagen de perfil">
			{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection
