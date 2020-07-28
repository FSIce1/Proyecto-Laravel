@extends('layouts.smart')

@section('modo', 'Agregar')

@section('titulo', 'Producto')

@section('titulo-ref', 'Agregar Producto')

@section('texto','llena los campos con la información necesario en el formulario')


@section('contenido-lista')
    <div class="panel-container show">

        <div class="panel-content">

            @include('utiles.errores')


            {!! Form::open(['route' => 'producto.store', 'method' => 'POST', 'class' => 'needs-validation']) !!}

                <!-- 
                    'method' => 'POST','novalidate'
                    TODO: El formulario del producto
                -->
                
                @include('producto.formulario_producto')
                
                <button class="btn btn-primary ml-auto" type="submit">Registrar</button>

                <a href="{{ url('producto')}}" class="btn btn-default">Cancelar</a>

            {!! Form::close() !!}



        </div>
    </div>
    <!-- 
                        <form class="needs-validation" novalidate>
                           
                            <div class="panel-content">
                                <div class="form-row">
                                    
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="validationCustom01">Nombre <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder="Nombre..." value="Codex" required>
                                        <div class="valid-feedback">
                                            Correcto!
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="validationCustom02">Apellido <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="validationCustom02" placeholder="Apellido..." value="Lantern" required>
                                        <div class="valid-feedback">
                                            Correcto!
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="validationCustomUsername">Usuario <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            </div>
                                            <input type="text" class="form-control" id="validationCustomUsername" placeholder="Usuario..." aria-describedby="inputGroupPrepend" required>
                                            <div class="invalid-feedback">
                                                Por favor, elija un nombre de usuario.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row form-group">
                                    
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="validationCustom03">Ciudad <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="validationCustom03" placeholder="Ciudad..." required>
                                        <div class="invalid-feedback">
                                            Proporcione una ciudad válida.
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="validationCustom03">Estado <span class="text-danger">*</span></label>
                                        <select class="custom-select" required="">
                                            <option value="">State</option>
                                            <option value="1">Michigan</option>
                                            <option value="2">New York</option>
                                            <option value="3">Oklahoma</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Proporcione un estado válido.
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="validationCustom05">Código Postal <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="validationCustom05" placeholder="Código Postal..." required>
                                        <div class="invalid-feedback">
                                            Proporcione una postal válida.
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 mb-3">
                                        <label class="form-label" for="validationTextarea2">Comentario <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="validationTextarea2" placeholder="Ejemplo..." required=""></textarea>
                                        <div class="invalid-feedback">
                                            Por favor ingrese un mensaje en el área de texto.
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Entrada de archivo personalizada</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customControlValidation7" required>
                                            <label class="custom-file-label" for="customControlValidation7">Elija el archivo...</label>
                                            <div class="invalid-feedback">Ejemplo de comentario de archivo personalizado no válido</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label mb-2">Por favor revele su perfil de género<span class="text-danger">*</span></label>
                                        <div class="custom-control custom-radio mb-2">
                                            <input type="radio" class="custom-control-input" id="GenderMale" name="radio-stacked" required="">
                                            <label class="custom-control-label" for="GenderMale">Masculino</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-2">
                                            <input type="radio" class="custom-control-input" id="GenderFemale" name="radio-stacked" required="">
                                            <label class="custom-control-label" for="GenderFemale">Femenino</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="genderPrivate" name="radio-stacked" required="">
                                            <label class="custom-control-label" for="genderPrivate">Prefiero no decirlo</label>
                                            <div class="invalid-feedback">Por favor seleccione al menos uno</div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="invalidCheck" required>
                                    <label class="custom-control-label" for="invalidCheck"> Acepta los términos y condiciones. <span class="text-danger">*</span></label>
                                    <div class="invalid-feedback">
                                        Debe aceptar antes de enviar.
                                    </div>
                                </div>
                                <button class="btn btn-primary ml-auto" type="submit">Registrar</button>
                            </div>

                        </form>
                    -->



    <!--
        TODO: PARA LAS VALIDACIONES CON EL SCRIPT
    <script>
        // Ejemplo de JavaScript de inicio para deshabilitar los envíos de formularios si hay campos no válidos
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Obtenga todos los formularios a los que queremos aplicar estilos personalizados de validación Bootstrap
                var forms = document.getElementsByClassName('needs-validation');


                // Bucle sobre ellas y evitar la presentación
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

    </script>
    -->


@endsection
