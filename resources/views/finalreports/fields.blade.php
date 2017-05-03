<!--- Students Attended Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('students_attended', 'Alumnos Atendidos:') !!}
    {!! Form::selectRange('students_attended', 1, 100, null, ['class' => 'form-control']) !!}
</div>

<!--- School Cycle Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('school_cycle', 'Ciclo Escolar:') !!}
    {!! Form::text('school_cycle', $period->name, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
</div>

<!--- Campus Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('campus', 'Plantel:') !!}
    {!! Form::text('campus', null, ['class' => 'form-control']) !!}
</div>

<!--- Turn Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('turn', 'Turno:') !!}
    {!! Form::text('turn', null, ['class' => 'form-control']) !!}
</div>

<!--- Date Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('date', 'Fecha de Elaboración:') !!}
    <input type="date" name="date" class="form-control">
</div>

<!--- Guidance Field --->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('guidance', 'Orientadores:') !!}
    {!! Form::textarea('guidance', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!--- Presentation Field --->
<div class="form-group col-sm-6 col-lg-12">
    {!! Form::label('presentation', 'Presentación:') !!}
    {!! Form::textarea('presentation', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!--- Activities Performed Field --->
<div class="form-group col-sm-6 col-lg-12">
    {!! Form::label('activities_performed', 'Actividades Realizadas:') !!}
    {!! Form::textarea('activities_performed', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!--- Results Field --->
<div class="form-group col-sm-6 col-lg-12">
    {!! Form::label('results', 'Resultados:') !!}
    {!! Form::textarea('results', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!--- Evaluation Field --->
<div class="form-group col-sm-6 col-lg-12">
    {!! Form::label('evaluation', 'Evaluación:') !!}
    {!! Form::textarea('evaluation', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!--- Suggestions Field --->
<div class="form-group col-sm-6 col-lg-12">
    {!! Form::label('suggestions', 'Sugerencias:') !!}
    {!! Form::textarea('suggestions', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!--- Elaboration Field --->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('elaboration', 'Elaborado por:') !!}
    {!! Form::textarea('elaboration', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!--- Vobo Field --->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('vobo', 'Vobo:') !!}
    {!! Form::textarea('vobo', null, ['class' => 'form-control ckeditor']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar Reporte', ['class' => 'btn uppercase btn-default']) !!}
</div>
