<!--- Students Attended Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('students_attended', 'Alumnos Atendidos:') !!}
    {!! Form::selectRange('students_attended', 1, 100, null, ['class' => 'form-control']) !!}
</div>

<!--- Campus Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('campus', 'Plantel:') !!}
    {!! Form::text('campus', null, ['class' => 'form-control']) !!}
</div>

<!--- Semester Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('semester', 'Semestre:') !!}
    {!! Form::text('semester', null, ['class' => 'form-control']) !!}
</div>

<!--- Turn Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('turn', 'Turno:') !!}
    {!! Form::select('turn',['Matutino' => 'Matutino', 'Vespertino' => 'Vespertino'],null, ['class' => 'form-control']) !!}
</div>

<!--- Date Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('date', 'Fecha de elaboración:') !!}
    <input type="date" name="date" class="form-control">
</div>

<!--- Problematic Field --->
<div class="form-group col-sm-6 col-lg-12">
    {!! Form::label('problematic', 'Problematica Detectada:') !!}
    {!! Form::textarea('problematic', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!--- General Objective Field --->
<div class="form-group col-sm-6 col-lg-12">
    {!! Form::label('general_objective', 'Obetivo General:') !!}
    {!! Form::textarea('general_objective', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!--- Students Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('students', 'Nombre del Alumno:') !!}
    {!! Form::textarea('students', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!--- Grade And Group Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('grade_and_group', 'Grado y Grupo:') !!}
    {!! Form::textarea('grade_and_group', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!--- Activities Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('activities', 'Actividades Realizadas:') !!}
    {!! Form::textarea('activities', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!--- Results Field --->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('results', 'Resultados:') !!}
    {!! Form::textarea('results', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!--- Observations Field --->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('observations', 'Observaciones:') !!}
    {!! Form::textarea('observations', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!--- Suggestions And Proposals Field --->
<div class="form-group col-sm-6 col-lg-12">
    {!! Form::label('suggestions_and_proposals', 'Sugerencias y propuestas:') !!}
    {!! Form::textarea('suggestions_and_proposals', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!--- Vobo Field --->
<div class="form-group col-sm-6 col-lg-12">
    {!! Form::label('vobo', 'Vobo:') !!}
    {!! Form::textarea('vobo', null, ['class' => 'form-control ckeditor']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
