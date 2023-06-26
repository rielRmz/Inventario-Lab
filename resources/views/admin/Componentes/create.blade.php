@extends('adminlte::page')

@section('title', 'Componentes')

@can('admin.componente.create')
    @section('content_header')
        <h1>Nuevo Componente</h1>
    @stop

    @section('content')
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::open(['route' => 'admin.componente.store']) !!}

                @include('admin.Componentes.modal.forms')

                <div class="row mb-3">
                    {!! Form::label('tipoComponente_id', 'Marca', ['class' => 'col-md-3 col-form-label']) !!}

                    <div class="col">
                        {!! Form::select('marca_id', $select2, null, ['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="row mb-3">
                    {!! Form::label('tipoComponente_id', 'Estado', ['class' => 'col-md-3 col-form-label']) !!}

                    <div class="col">
                        {!! Form::select('estatus_id', $select3, null, ['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="row mb-3">
                    {!! Form::label('tipoComponente_id', 'Categoria', ['class' => 'col-md-3 col-form-label']) !!}

                    <div class="col">
                        {!! Form::select('tipoComponente_id', $select1, null, ['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="row-3 mb-0">
                    <div class="col-md-8 offset-md-4">
                        {!! Form::submit('Nuevo Componente', ['class' => 'btn btn-outline-primary']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    @stop
@endcan

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
