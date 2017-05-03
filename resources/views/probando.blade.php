@extends('layouts.app')

@section('htmlheader_title')
Home
@endsection


@section('main-content')
<div class="container spark-screen">
	<div class="row">
		<div class="col-md-10 col-md-offset-3">
			@foreach($activities as $activity)
				<a target="_blank" href="{{ $activity->link_to_activity }}"><strong><h2>{{$activity->title}}</h2></strong></a>
				<img class="img-thumbnail img-responsive" src="{{asset('/uploads/activities/')}}/{{ $activity->image }}" alt="">
			@endforeach
		</div>
	</div>
</div>
@endsection
