@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
@include('sweet::alert')
	<div class="container spark-screen">
		<div class="row">
			@role('coordinador')
				<img style="width: 100%" src="{{asset('/img/coordinador.jpg')}}" alt="cobach chiapas tutorias">
			@endrole
			@role('tutor')
				<img style="width: 100%" src="{{asset('/img/tutor.jpg')}}" alt="cobach chiapas tutorias">
			@endrole
			@role('alumno')
				<img style="width: 100%" src="{{asset('/img/alumno.jpg')}}" alt="cobach chiapas tutorias">
			@endrole
		</div>
	</div>
@endsection
