<!--- Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name', 'Titulo del comentario:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!--- Body Field --->
<div class="form-group col-sm-6 col-lg-12">
    {!! Form::label('body', 'Redactar comentario:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control ckeditor']) !!}
    <input name="student_id" type="hidden" value="{{$student->id}}">
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Enviar comentario', ['class' => 'btn uppercase btn-default']) !!}
</div>
