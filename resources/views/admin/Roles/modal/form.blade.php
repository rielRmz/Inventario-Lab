<div class="form-group">
    {!! Form::label('name', 'Nuevo rol') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del nuevo rol a crear']) !!}
</div>

<h2 class="h5">Listado de Permisos</h2>

@foreach($permissions as $permission)
    <div class="form-check form-switch">
        <label class="form-check-label">
            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'form-check-input mr-1']) !!}
            {{ $permission->description }}
        </label>
    </div>
@endforeach
