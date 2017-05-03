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

<!--- Date Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('date', 'Fecha de elaboración:') !!}
    <input type="date" name="date" value="{{ $tutoring->date }}" class="form-control">
</div>

<!--- Presentation Field --->
<div class="form-group col-sm-6 col-lg-12">
    {!! Form::label('presentation', 'Presentación:') !!}
    {!! Form::textarea('presentation', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!--- General Objective Field --->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('general_objective', 'Objetivo General:') !!}
    {!! Form::textarea('general_objective', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!--- Specific Objectives Field --->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('specific_objetives', 'Objetivos Especificos:') !!}
    {!! Form::textarea('specific_objetives', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!--- Elaboration Field --->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('elaboration', 'Elaborarón:') !!}
    {!! Form::textarea('elaboration', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!--- Vobo Field --->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('vobo', 'Vto. Bno:') !!}
    {!! Form::textarea('vobo', null, ['class' => 'form-control ckeditor']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn uppercase btn-default']) !!}
</div>
