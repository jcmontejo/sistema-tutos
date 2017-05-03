<!--- Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!--- Father Last Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('father_last_name', 'Apellido Paterno:') !!}
    {!! Form::text('father_last_name', null, ['class' => 'form-control']) !!}
</div>

<!--- Mother Last Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('mother_last_name', 'Apellido Materno:') !!}
    {!! Form::text('mother_last_name', null, ['class' => 'form-control']) !!}
</div>

<!--- Enrollment Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('enrollment', 'Número de Matricula:') !!}
    {!! Form::text('enrollment', null, ['class' => 'form-control']) !!}
</div>

<!--- Email Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('email', 'Correo Electronico:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!--- Grade Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('grade', 'Grado:') !!}
    {!! Form::selectRange('grade',1,6, null, ['class' => 'form-control']) !!}
</div>

<!--- Group Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('group', 'Grupo:') !!}
    {!! Form::text('group', null, ['class' => 'form-control']) !!}
</div>

<!--- Turn Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('turn', 'Turno:') !!}
    {!! Form::select('turn',['MATUTINO' => 'MATUTINO', 'VESPERTINO' => 'VESPERTINO'], null, ['class' => 'form-control']) !!}
</div>

<!--- Address Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('address', 'Dirección:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!--- Phone Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('phone', 'Teléfono particular:') !!}
    <input id="optional-phone" type="text" name="phone" class="form-control bfh-phone" data-format="+1 (ddd) ddd-dddd">
</div>

<!--- Emergency Number Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('emergency_number', 'Teléfono de Emergencia:') !!}
    {!! Form::text('emergency_number', null, ['class' => 'form-control']) !!}
</div>

<!--- State Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('state', 'Estado:') !!}
    <select id="estados" class="form-control" name="state">
                     <option></option>                  
                  </select>
</div>

<!--- Municipality Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('municipality', 'Municipio:') !!}
     <select class="form-control" id="municipio" name="municipality">
                  </select>
</div>
<!--- Tutor Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('tutors_id', 'Tutor Asignado:') !!}
   {!! Form::select('tutors_id', $tutors, null, ['id'=>'Tutor', 'class' => 'form-control']) !!}
</div>

<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>
