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

<!--- Email Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('email', 'Correo Electronico:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!--- Address Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('address', 'Dirección:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!--- Phone Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('phone', 'Teléfono Particular:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
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

<!--- Academic Title Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('academic_title', 'Titulo Academico:') !!}
    {!! Form::text('academic_title', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar tutor', ['class' => 'btn uppercase btn-default']) !!}
</div>
