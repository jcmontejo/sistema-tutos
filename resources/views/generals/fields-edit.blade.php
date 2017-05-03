<!--- Students Attended Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('students_attended', 'Alumnos Atendidos:') !!}
    {!! Form::selectRange('students_attended', 1,100, null, ['class' => 'form-control']) !!}
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
    {!! Form::select('turn', ['MATUTINO' => 'MATUTINO', 'VESPERTINO' => 'VESPERTINO'], null, ['class' => 'form-control']) !!}
</div>

<!--- Date Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('date', 'Fecha de Elaboración:') !!}
    <input type="date" name="date" value="{{ $general->date }}" class="form-control">
</div>

<!--- General Objective Field --->
<div class="form-group col-sm-6 col-lg-12">
    {!! Form::label('general_objective', 'Objetivo General:') !!}
    {!! Form::textarea('general_objective', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!--- Elaboration Field --->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('elaboration', 'Elaboraron:') !!}
    {!! Form::textarea('elaboration', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!--- Vobo Field --->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('vobo', 'Vto. Bno:') !!}
    {!! Form::textarea('vobo', null, ['class' => 'form-control ckeditor']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar Reporte', ['class' => 'btn uppercase btn-default']) !!}
</div>
