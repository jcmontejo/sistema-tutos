<!--- Theme Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('theme', 'Tema:') !!}
    {!! Form::textarea('theme', null, ['class' => 'form-control']) !!}
</div>

<!--- Activity Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('activity', 'Actividad:') !!}
    {!! Form::textarea('activity', null, ['class' => 'form-control']) !!}
</div>

<!--- Objective Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('objective', 'Objetivo:') !!}
    {!! Form::textarea('objective', null, ['class' => 'form-control']) !!}
</div>

<!--- Resources Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('resources', 'Recursos materiales y/o humanos:') !!}
    {!! Form::textarea('resources', null, ['class' => 'form-control']) !!}
</div>

<!--- Schedule Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('schedule', 'Cronograma:') !!}
    {!! Form::textarea('schedule', null, ['class' => 'form-control']) !!}
</div>

<!--- Evaluation And Follow Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('evaluation_and_follow', 'Evaluación y seguimiento:') !!}
    {!! Form::textarea('evaluation_and_follow', null, ['class' => 'form-control']) !!}
    <input type="hidden" name="general_id" value="{{$general->id}}">
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('guardar', ['class' => 'uppercase btn btn-primary']) !!}
</div>
