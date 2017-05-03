<!--- Type Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('type', 'Tipo:') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!--- Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!--- Description Field --->
<div class="form-group col-sm-6 col-lg-12">
    {!! Form::label('description', 'Descripción:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!--- Date Delivery Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('date_delivery', 'Fecha de entrega:') !!}
    <input name="date_delivery" type="date" class="form-control">
    <input name="student_id" type="hidden" value="{{$student->id}}">
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Enviar tarea', ['class' => 'btn uppercase btn-default']) !!}
</div>
