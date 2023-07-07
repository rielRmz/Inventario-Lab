<div class="row mb-3">
    {!! Form::label('No_Serie', 'Codigo de la Licencia', ['class' => 'col-md-3 col-form-label']) !!}

    <div class="col">
        {!! Form::text('No_Serie', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row mb-3">
    {!! Form::label('descripcion', 'Descripción', ['class' => 'col-md-3 col-form-label']) !!}

    <div class="col">
        {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row mb-3">
    {!! Form::label('fecha_Activacion', 'Fecha de Activación', ['class' => 'col-md-3 col-form-label']) !!}

    <div class="col">
        {!! Form::date('fecha_Activacion', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row mb-3">
    {!! Form::label('fecha_Caducacion', 'Fecha de Caducación', ['class' => 'col-md-3 col-form-label']) !!}

    <div class="col">
        {!! Form::date('fecha_Caducacion', null, ['class' => 'form-control']) !!}
    </div>
</div>
