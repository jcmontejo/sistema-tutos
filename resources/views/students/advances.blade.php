@extends('layouts.app')

@section('main-content')

<div class="container">

    @include('sweet::alert')

    <div class="row">
        <h1 class="pull-left">Avances</h1>
        <?php
        $user = Auth::user();
        $student = $user->student;
        $activity = DB::table('exercises')->where('student_id', '=', $student->id)->count();
        $comments = $student->comments;
        ?>
    </div>

    <div class="row">
        <div class="table-responsive">
            <table class="table" id="myTable">
                <thead>
                    <th>Fecha</th>
                    <th>Tareas realizadas</th>
                    <th>Actividades realizadas</th>
                    <th>Comentarios del tutor</th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <script>
                                var today = new Date();
                                var dd = today.getDate();
                                var mm = today.getMonth()+1; //January is 0!
                                var yyyy = today.getFullYear();

                                if(dd<10) {
                                    dd='0'+dd
                                } 

                                if(mm<10) {
                                    mm='0'+mm
                                } 

                                today = dd+'/'+mm+'/'+yyyy;
                                document.write(today);
                            </script>
                        </td>
                        <td>
                            <h2>{{$tasks->count()}}</h2>
                            <strong><a href="{!! route('view.tasks', [$student->id]) !!}">Ver Tareas</a></strong>
                        </td>
                        <td style="vertical-align: middle;" ><div class="btn-group">
                            <h2>{{$activity}}</h2>
                            <strong><a href="{{ url('/view-activities-suggested')}}">Ver Actividades</a></strong>
                        </div>

                    </td>
                    <td style="vertical-align: middle;" ><div class="btn-group">
                        <ul class="menu">
                            @foreach($comments as $comment)
                            <li><!-- start message -->
                                <a href="{{ url('comments')}}/{{$comment->id}}">
                                    <!-- Message title and timestamp -->
                                    <h4>
                                        {{$comment->name}}
                                        <small><i class="fa fa-clock-o"></i> {{$comment->created_at}}</small>
                                    </h4>
                                </a>
                            </li><!-- end message -->
                            @endforeach
                        </ul><!-- /.menu -->
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</div>
</div>
@endsection