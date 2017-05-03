<!--- Title Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('title', 'Titulo:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!--- Image Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('image', 'Imagen:') !!}
    <input type="file" name="image">
</div>

<!--- Link To Activity Field --->
<div class="form-group col-sm-6 col-lg-12">
    {!! Form::label('link_to_activity', 'Link a Actividad:') !!}
    {!! Form::textarea('link_to_activity', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar actividad', ['class' => 'btn uppercase uppercase btn-default']) !!}
</div>
