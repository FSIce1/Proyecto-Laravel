@extends('layouts.smart')

@section('modo', 'Modificar')

@section('titulo', 'Marca')

@section('titulo-ref', 'Modificar Marca')

@section('texto','llena los campos con la información necesario en el formulario')


@section('contenido-lista')
    
    <div class="panel-container show">

        <div class="panel-content">

            @include('utiles.errores')

            {!! Form::model($marca,['route' => ['marca.update',$marca->id_marca], 'method' => 'PUT', 'class' => 'needs-validation']) !!}

                <!-- 
                    TODO: El formulario del producto
                -->
                
                @include('marca.formulario_marca')

                <button class="btn btn-primary ml-auto" type="submit">Registrar</button>

                <a href="{{ url('marca')}}" class="btn btn-default">Cancelar</a>

            {!! Form::close() !!}

        </div>
    </div>

@endsection
