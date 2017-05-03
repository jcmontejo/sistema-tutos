@extends('layouts.app')

@section('htmlheader_title')
Actualizar contraseña
@endsection


@section('main-content')
	@include('sweet::alert')
<div class="container spark-screen">
	<div class="row">
		{!! Form::open(array('url' => '/change', 'method' => 'post')) !!}
		  {{ csrf_field() }}
			<div class="form-group col-sm-6 col-lg-4">
				<label for="">Contraseña nueva</label>
				<input type="password" name="newpassword" class="form-control">
				<br>
				<input type="submit" value="Actualizar" class="btn btn-default uppercase">
			</div>
		 {!! Form::close() !!}
	</div>
</div>
@endsection
