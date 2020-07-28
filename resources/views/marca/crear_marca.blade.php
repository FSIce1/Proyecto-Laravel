@extends('layouts.smart')

@section('modo', 'Agregar')

@section('titulo', 'Marca')

@section('titulo-ref', 'Agregar Marca')

@section('texto','llena los campos con la información necesario en el formulario')


@section('contenido-lista')
    <div class="panel-container show">

        <div class="panel-content">

            @include('utiles.errores')


            {!! Form::open(['route' => 'marca.store', 'method' => 'POST', 'class' => 'needs-validation']) !!}

                <!-- 
                    'method' => 'POST','novalidate'
                    TODO: El formulario del producto
                -->
                
                @include('marca.formulario_marca')
                
                <button class="btn btn-primary ml-auto" type="submit">Registrar</button>

                <a href="{{ url('marca')}}" class="btn btn-default">Cancelar</a>

            {!! Form::close() !!}

        </div>
    </div>

@endsection
