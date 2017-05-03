<!--- Students Attended Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('students_attended', 'Alumnos Atendidos:') !!}
    {!! Form::selectRange('students_attended', 1,100, null, ['class' => 'form-control']) !!}
</div>

<!--- Semester Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('semester', 'Semestre:') !!}
    {!! Form::text('semester', null, ['class' => 'form-control']) !!}
</div>

<!--- Turn Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('turn', 'Turno:') !!}
    {!! Form::select('turn', ['MATUTINO' => 'MATUTINO', 'VESPERTINO' => 'VESPERTINO'], null, ['class' => 'form-control']) !!}
</div>

<!--- Campus Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('campus', 'Plantel:') !!}
    {!! Form::text('campus', null, ['class' => 'form-control']) !!}
</div>

<!--- Date Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('date', 'Fecha de Elaboración:') !!}
    <input type="date" name="date" class="form-control">
</div>

<!--- Problematic Field --->
<div class="form-group col-sm-6 col-lg-12">
    {!! Form::label('problematic', 'Problematica:') !!}
    {!! Form::textarea('problematic', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!--- Elaboration Field --->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('elaboration', 'Elaboraron:') !!}
    {!! Form::textarea('elaboration', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!--- Vobo Field --->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('vobo', 'Vobo:') !!}
    {!! Form::textarea('vobo', null, ['class' => 'form-control ckeditor']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar programa individual', ['class' => ' uppercase btn btn-default']) !!}
</div>
