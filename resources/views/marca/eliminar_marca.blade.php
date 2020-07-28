@extends('layouts.smart')

@section('modo', 'Eliminar')

@section('titulo', 'Marca')

@section('titulo-ref', 'Eliminar Marca')

@section('texto','confirma...')

@section('contenido-lista')
    <div class="panel-container show">

        <div class="panel-content">

            {!! Form::open(['route' => ['marca.destroy',$marca->id_marca], 'method' => 'DELETE', 'class' => 'needs-validation']) !!}
                
                <button class="btn btn-primary ml-auto" type="submit">Registrar</button>

                <a href="{{ url('marca')}}" class="btn btn-default">Cancelar</a>

            {!! Form::close() !!}

        </div>
    </div>

@endsection
