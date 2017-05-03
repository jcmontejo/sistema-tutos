<!--- Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!--- Start Period Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('start_period', 'Fecha de Inicio:') !!}
    <input type="date" name="start_period" class="form-control">
</div>

<!--- End Period Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('end_period', 'Fecha de Termino:') !!}
    <input type="date" name="end_period" class="form-control">
</div>

<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar ciclo', ['class' => 'btn uppercase btn-default']) !!}
</div>
