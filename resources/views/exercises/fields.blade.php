<!--- Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('activity', 'Actividad:') !!}
    {!! Form::select('activity',$activities, null, ['class' => 'form-control']) !!}
    <input name="student_id" type="hidden" value="{{$student->id}}">
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Agregar Actividad', ['class' => 'btn uppercase btn-default']) !!}
</div>
