@extends('layouts.smart')

@section('modo', 'Eliminar')

@section('titulo', 'Producto')

@section('titulo-ref', 'Eliminar Producto')

@section('texto','confirma...')

@section('contenido-lista')
    <div class="panel-container show">

        <div class="panel-content">

            {!! Form::open(['route' => ['producto.destroy',$producto->id_producto], 'method' => 'DELETE', 'class' => 'needs-validation']) !!}

                <!-- 
                    TODO: FORMULARIO DE CONFIRMACIÓN
                    
                -->
                
                
                <button class="btn btn-primary ml-auto" type="submit">Registrar</button>

                <a href="{{ url('producto')}}" class="btn btn-default">Cancelar</a>

            {!! Form::close() !!}

        </div>
    </div>

@endsection
