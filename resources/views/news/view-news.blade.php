@extends('layouts.app')

@section('htmlheader_title')
Home
@endsection


@section('main-content')
<div class="container spark-screen">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			@foreach($news as $new)
				<h2>{{$new->title}}</h2>
				{!! $new->link_to_pdf!!}
			@endforeach
		</div>
	</div>
</div>
@endsection
