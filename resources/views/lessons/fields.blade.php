<!--- Date Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('date', 'Date:') !!}
    <input type="date" name="date" class="form-control">
</div>

<!--- Hora Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('hora', 'Hora:') !!}
    <input type="time" name="hora" placeholder="hrs:mins" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" class="form-control" required>
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar sesión', ['class' => 'btn uppercase btn-default']) !!}
</div>
