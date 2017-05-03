<!--- Body Field --->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('body', 'Cuerpo del Acta:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control ckeditor']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar Acta', ['class' => 'btn uppercase btn-default']) !!}
</div>
