@extends('layouts.smart')

@section('modo', 'Listado')

@section('titulo', 'Documento')

@section('titulo-ref', 'Lista de Documentos')

@section('texto','busca, elimina, modifica, exporta en las siguiente lista')

@section('contenido-modal')
    
    <div class="modal fade" id="default-example-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                {!! Form::open(['id' => 'form']) !!}

                <div class="modal-header">
                    <h4 id="tituloModal" name="tituloModal" class="modal-title">
                        Agregar Documento
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>

                <div class="modal-body">

                    <div id='campo-alertas' class="alert alert-primary alert-dismissible" style="display: none">
                        <!--
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="fal fa-times"></i>
                            </span>
                        </button>
                        -->
                        <div class="d-flex flex-start w-100">
                            <div class="mr-2 d-sm-none d-md-block">
                                <span class="icon-stack icon-stack-lg">
                                    <i class="base base-6 icon-stack-3x opacity-100 color-primary-500"></i>
                                    <i class="base base-10 icon-stack-2x opacity-100 color-primary-300 fa-flip-vertical"></i>
                                    <i class="fal fa-info icon-stack-1x opacity-100 color-white"></i>
                                </span>
                            </div>
                
                            <div class="d-flex flex-fill">
                                <div class="flex-fill">
                                    <span class="h5">Información</span>
                                    <br/><br/>

                                    <div id='mensaje-error'>

                                    </div>
                                    
                                </div>
                            </div>
                
                        </div>
                    </div>
                

                    <div class="input-group flex-nowrap">

                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fal fa-user fs-xl"></i></span>
                        </div>

                        {!! Form::hidden('id_documento', null, ['id' => 'id_documento']) !!}
                    
                        {!! Form::text('descripcion_documento', null, ['id' => 'descripcion_documento', 'class' => 'form-control',
                        'placeholder' => 'Ingrese Descripción...']) !!}
    
                        {!! Form::hidden('condicion_documento', '0', ['id' => 'condicion_documento']) !!}
                    </div>
                </div>


                <div class="modal-footer">
                
                    {!! link_to('#', 'Guardar', ['id'=>'Guardar','class'=>'btn btn-primary ml-auto']) !!}
                    
                    {!! link_to('#', 'Modificar', ['id'=>'Modificar','class'=>'btn btn-primary ml-auto']) !!}
                
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection

@section('contenido-lista')
    <div class="panel-container show">

        <div class="panel-content">

            <div class="frame-wrap">
                <div class="demo">
                    <!-- BOTON NUEVO -->
                    <a href="" onclick="Mostrar('0')" class="btn btn-outline-success" data-toggle="modal" data-target="#default-example-modal">Nuevo</a>
                </div>
            </div>

            <!-- INICIO LISTA -->
            
        <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
            <thead class="bg-primary-600">
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Condición</th>
                    <th>Opciones</th>
                    <!--
                    <th>Modificar</th>
                    <th>Eliminar</th>
                    -->
                </tr>
            </thead>
            
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Condición</th>
                    <th>Opciones</th>
                    <!--
                    <th>Modificar</th>
                    <th>Eliminar</th>
                    -->
                </tr>
            </tfoot>
        </table>

            <!-- FIN LISTA -->


        </div>

    </div>
@endsection

@section('scripts')

<script>


    var click= false;



    // PARA EVITAR EL ENTER
    document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('input[type=text]').forEach( node => node.addEventListener('keypress', e => {
        if(e.keyCode == 13) {
          e.preventDefault();
          //alert('PRESIONASTE EL ENTER :v');
        }
      }))
    });

    
    

    $(document).ready(function() {

        // PRUEBA DE ATAJOS
        $(document).on('keydown', null,'ctrl+y', function(){
            alert('Ctrl + y');
        });
        $(document).on('keydown', null,'ctrl+m', function(){
            $('#default-example-modal').modal('hide');
        });

        
        // INICIALIZO LISTA
        $('#dt-basic-example').dataTable({

            'processing':true,
            'serverSide': true,
            "ajax": "{{ route('documento.listar') }}",
            "columns": [
                {data: 'id_documento'},
                {data: 'descripcion_documento'},
                {data: 'condicion_documento'},
                {data: 'action', oderable: false, searchable: false},
            ],


            responsive: true,
            lengthChange: false,
            dom: "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [
                /*{
                extend:    'colvis',
                text:      'Column Visibility',
                titleAttr: 'Col visibility',
                className: 'mr-sm-3'
                },*/
                {
                    extend: 'pdfHtml5',
                    text: 'PDF',
                    titleAttr: 'Generar PDF',
                    className: 'btn-outline-danger btn-sm mr-1'
                },
                {
                    extend: 'excelHtml5',
                    text: 'Excel',
                    titleAttr: 'Generar Excel',
                    className: 'btn-outline-success btn-sm mr-1'
                },
                {
                    extend: 'csvHtml5',
                    text: 'CSV',
                    titleAttr: 'Generar CSV',
                    className: 'btn-outline-primary btn-sm mr-1'
                },
                {
                    extend: 'copyHtml5',
                    text: 'Copiar',
                    titleAttr: 'Copiar al portapapeles',
                    className: 'btn-outline-primary btn-sm mr-1'
                },
                {
                    extend: 'print',
                    text: 'Imprimir',
                    titleAttr: 'Imprimir Tabla',
                    className: 'btn-outline-primary btn-sm'
                }
            ], 
            "language":{
                "sProcessing": "Procesando..."
            }
        });

        // GUARDAR
        $("#Guardar").click(function(event){
        //$("#Guardar").one('click', function (event) { 
           
            // EL DOBLE CLICK
            
            if(click){
                //alert("Ya clickeaste mrd");
            } else {
                click = true;
                // DATOS
                var nombre = $("#descripcion_documento").val();
                var condicion = $("#condicion_documento").val();
                
                // TOKEN
                var token = $("input[name=_token]").val();

                var ruta = "{{ route('documento.store') }}";

                //var datos = $('#form').serialize();
                var datos = "descripcion_documento="+nombre+"&condicion_documento="+condicion;

                $.ajax({
                    url: ruta,
                    headers: {'X-CSRF-TOKEN': token},
                    type: 'post',
                    datatype: 'json',
                    data: datos,
                    success: function(data){
                        if(data.success == 'true'){
                            // Recarga lista
                            setTimeout(function(){$('#dt-basic-example').DataTable().ajax.reload(null, false);}, 1000);
                            
                            // Cierra Modal
                            $('#default-example-modal').modal('hide');
                            
                            // Muestra alerta
                            
                            Swal.fire({
                                type: "success",
                                title: "Documento insertado correctamento",
                                showConfirmButton: false,
                                timer: 1500
                            });

                        } else {
                            Swal.fire({
                                type: "error",
                                title: "Documento no pudo ser insertado",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    },
                    error: function(data){
                        $("#mensaje-error").html(data.responseJSON.errors.descripcion_documento);
                        $("#campo-alertas").fadeIn();
                        
                        alert(data.responseJSON.errors.status);
                        if(data.status == 500){
                            Swal.fire({
                                type: "error",
                                title: "Error interno",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }

                        click=false;
                    }
                });

            }
            

        });
        
        // MODIFICAR
        $("#Modificar").click(function(e){

            // EL DOBLE CLICK
            
            if(click){
                //alert("Ya clickeaste mrd");
            } else {
                // DATOS
                var id = $("#id_documento").val();
                var nombre = $("#descripcion_documento").val();
                var condicion = $("#condicion_documento").val();
                
                // TOKEN
                var token = $("input[name=_token]").val();

                var ruta = "{{url('documento')}}/"+id+"";

                //var datos = $('#form').serialize();
                var datos = "id_documento="+id+"&descripcion_documento="+nombre+"&condicion_documento="+condicion;

                $.ajax({
                    url: ruta,
                    headers: {'X-CSRF-TOKEN': token},
                    type: 'PUT',
                    datatype: 'json',
                    data: datos,
                    success: function(data){
                        if(data.success == 'true'){
                            // Recarga lista
                            setTimeout(function(){$('#dt-basic-example').DataTable().ajax.reload(null, false);}, 1000);
                            
                            // Cierra Modal
                            $('#default-example-modal').modal('hide');
                            
                            // Muestra alerta
                            Swal.fire({
                                type: "success",
                                title: "Documento modificado correctamente",
                                showConfirmButton: false,
                                timer: 1500
                            });

                        } else {
                            Swal.fire({
                                type: "error",
                                title: "Documento no pudo ser modificado",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    },
                    error: function(data){
                        $("#mensaje-error").html(data.responseJSON.errors.descripcion_documento);
                        $("#campo-alertas").fadeIn();
                        click=false;
                    }
                });
            }
        
        });

    });

    // ELIMINAR
    var Eliminar = function(id){

        var swalWithBootstrapButtons = Swal.mixin(
        {
            customClass:
            {
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-danger mr-2"
            },
            buttonsStyling: false
        });
        swalWithBootstrapButtons
            .fire(
            {
                title: "¿Desea eliminar?",
                //text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí, deseo eliminar!",
                cancelButtonText: "No, cancelar!",
                reverseButtons: true
            })
            .then(function(result)
            {
                if (result.value){
                    
                    // SE ELIMINA EL REGISTRO
                    
                    var token = $("input[name=_token]").val();
                    var ruta = "{{url('documento')}}/"+id+"";

                    $.ajax({
                        url: ruta,
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'DELETE',
                        datatype: 'json',
                        success: function(data){
                            if(data.success == 'true'){
                                // Recarga lista
                                setTimeout(function(){$('#dt-basic-example').DataTable().ajax.reload(null, false);}, 1000);
                                
                                // Cierra Modal
                                $('#default-example-modal').modal('hide');
                                
                                // Muestra alerta

                                swalWithBootstrapButtons.fire(
                                    "¡Eliminado!",
                                    "",
                                    "success"
                                );
                                /*
                                Swal.fire({
                                    type: "success",
                                    title: "Área modificada correctamente",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                */
                            } else {
                                /*
                                Swal.fire({
                                    type: "error",
                                    title: "Área no pudo ser modificada",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                */
                                swalWithBootstrapButtons.fire(
                                    "Cancelado",
                                    "",
                                    "error"
                                );
                            }
                        },
                        error: function(data){
                        }
                    });

                }else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                )
                {
                    swalWithBootstrapButtons.fire(
                        "Cancelado",
                        "",
                        "error"
                    );
                }
            });

    }

    // MANDAR DATOS
    var Mostrar = function(id){

        $('#default-example-modal').modal('show');
        
        click=false;
        
        if(id==0){ // hide()->cerrar, show()->abrir
            
            document.getElementById("tituloModal").innerHTML = "Nuevo Documento";
            
            $("#Guardar").show();
            $("#Modificar").hide();
        } else {
            
            document.getElementById("tituloModal").innerHTML = "Modificar Documento";
            
            $("#Guardar").hide(); 
            $("#Modificar").show();
            var route = "{{url('documento')}}/"+id+"/edit";

            $.get(route, function(data){
                $("#id_documento").val(data.id_documento);
                $("#descripcion_documento").val(data.descripcion_documento);
                $("#condicion_documento").val(data.condicion_documento);
            });

        }
        
        $("#descripcion_documento").focus();

    }

    // CUANDO CIERRAS EL MODAL
    $("#default-example-modal").on("hidden.bs.modal", function(){
        $("#campo-alertas").fadeOut();
        limpiarDatos();
    });

    // LIMPIO FORMULARIO
    var limpiarDatos = function(){
        document.getElementById("form").reset();
    }

    </script>

    <!-- PARA LOS CLICKS-->
    <script src="https://rawgit.com/jeresig/jquery.hotkeys/master/jquery.hotkeys.js"></script>

@endsection
