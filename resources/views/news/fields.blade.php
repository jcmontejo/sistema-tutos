<!--- Title Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('title', 'Titulo:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!--- Link To Pdf Field --->
<div class="form-group col-sm-6 col-lg-12">
    {!! Form::label('link_to_pdf', 'Link a PDF:') !!}
    {!! Form::textarea('link_to_pdf', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar Noticia', ['class' => 'btn uppercase btn-default']) !!}
</div>
