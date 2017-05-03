@extends('layouts.app')

@section('htmlheader_title')
Actividades Sugeridas
@endsection


@section('main-content')
<div class="container spark-screen">
	<div class="row">
		<div class="col-md-10 col-md-offset-3">
			<?php
			$user = App\Models\Student::find(15);
			$activities = DB::select('select * from exercises where student_id = ?', [$user->id]);
			foreach ($activities as $item) {
				$id = $item->activity;
				$activity = DB::table('activities')->where('id', '=', $id)->first();
				?>
				<a target="_blank" href="{{ $activity->link_to_activity }}"><strong><h2>{{$activity->title}}</h2></strong></a>
				<img class="img-thumbnail img-responsive" src="{{asset('/uploads/activities/')}}/{{ $activity->image }}" alt="">
				<?php
			}
			?>
		</div>
	</div>
</div>
@endsection
