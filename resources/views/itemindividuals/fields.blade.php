<!--- Objetives Field --->
<div class="form-group col-sm-6 col-lg-12">
    {!! Form::label('objetives', 'Objetivos Especificos:') !!}
    {!! Form::textarea('objetives', null, ['class' => 'form-control ckeditor']) !!}
    <input type="hidden" name="individual_id" value="{{$individual->id}}">
</div>

<!--- Activities Field --->
<div class="form-group col-sm-6 col-lg-12">
    {!! Form::label('activities', 'Actividades:') !!}
    {!! Form::textarea('activities', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!--- Date Field --->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('date', 'Fechas:') !!}
    {!! Form::textarea('date', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!--- Resources Field --->
<div class="form-group col-sm-6 col-lg-12">
    {!! Form::label('resources', 'Recursos Didacticos:') !!}
    {!! Form::textarea('resources', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!--- Evidence Field --->
<div class="form-group col-sm-6 col-lg-12">
    {!! Form::label('evidence', 'Evidencias:') !!}
    {!! Form::textarea('evidence', null, ['class' => 'form-control ckeditor']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn uppercase btn-default']) !!}
</div>
