@extends('layouts.smart')

@section('modo', 'Listado')

@section('titulo', 'Documento')

@section('titulo-ref', 'Lista de Documentos')

@section('texto','busca, elimina, modifica, exporta en las siguiente lista')

@section('contenido-modal')
    
    <div class="modal fade" id="default-example-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                {!! Form::open(['id' => 'form','class' => 'needs-validation', 'files' => true]) !!}

                <div class="modal-header">
                    <h4 id="tituloModal" name="tituloModal" class="modal-title">
                        Agregar Documento
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>

                <div class="modal-body">

                    
                    {!! Form::hidden('id_documento', null, ['id' => 'id_documento']) !!}

                    {!! Form::hidden('condicion_documento', '0', ['id' => 'condicion_documento']) !!}
            
                    {!! Form::hidden('nombre_documento', 'Sin documento.ic', ['id' => 'nombre_documento']) !!}
                    
                    <div class="form-group">
                        
                        {!! Form::label('descripcion_documento', 'Descripcion', ['class'=>'form-label']) !!}

                        {!! Form::textarea('descripcion_documento', '', ['id' => 'descripcion_documento', 'class' => 'form-control id-descripcion',
                        'placeholder' => 'Ingrese Descripción...','rows' => '4']) !!}

                        <div id='mensaje-error-descripcion' class="invalid-feedback">
                        </div>

                    </div>

                    <div class="form-group">
                        
                        {!! Form::label('archivo_documento', 'Archivo', ['class'=>'form-label']) !!}
                        
                        <div class="custom-file">

                            {!! Form::file('archivo_documento', ['id' => 'archivo_documento', 'class' => 'custom-file-input id-archivo']) !!}
                            
                            {!! Form::label('archivo_documento', 'Seleccion archivo...', ['class' => 'custom-file-label' ]) !!}
                            
                            <div id='fichero'>
                                Cargando
                            </div>

                            <div id='nombre-fichero'>
                                Sin seleccionar archivo... 
                            </div>

                            <div id='mensaje-error-archivo' class="invalid-feedback">
                            </div>
                            
                            <div id='visorDoc'>

                            </div>

                        </div>
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
                    <th WIDTH="20">ID</th>
                    <th WIDTH="50">Nombre Documento</th>
                    <th WIDTH="100">Descripción</th>
                    <th WIDTH="20">Condición</th>
                    <th WIDTH="30">Opciones</th>
                    <!--
                    <th>Modificar</th>
                    <th>Eliminar</th>
                    -->
                </tr>
            </thead>
            
            <tfoot>
                
                <tr>
                    <th WIDTH="20">ID</th>
                    <th WIDTH="50">Nombre Documento</th>
                    <th WIDTH="100">Descripción</th>
                    <th WIDTH="20">Condición</th>
                    <th WIDTH="30">Opciones</th>
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


    // PARA EL FILE

    $('#archivo_documento').change(function (e) {
        var inputArchivo = document.getElementById('archivo_documento');
        $('#nombre-fichero').text(inputArchivo.files[0].name);

        if(inputArchivo.files && inputArchivo.files[0]){
            var visor = new FileReader();
            $('#visorDoc').show();

            visor.onload = function(e){
                document.getElementById('visorDoc').innerHTML = '<embed src="'+e.target.result+'" WIDTH="460" HEIGHT="400">';
            };

            visor.readAsDataURL(inputArchivo.files[0]);
        }

    });

    var window_focus;

    //$("#nombre-fichero").show();
    $("#fichero").hide();

    $(window).focus(function() {
        window_focus = true;
    }).blur(function() {
        window_focus = false;
    });

    $( "#archivo_documento" ).bind( "click", function() {
        $("#fichero").show();
        
        var loopFocus = setInterval(function() {
            if (window_focus) {
                clearInterval(loopFocus);
                $("#fichero").hide();
                
                if ($("#archivo_documento").val() === ''){ // SE CANCELA LA ACCIÓN
                    $('#nombre-fichero').text('Sin seleccionar archivo... ');
                    $('#visorDoc').hide(); // cierro mi visor
                }
            }
        }, 500);
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
                {data: 'nombre_documento'},
                {data: 'descripcion_documento'},
                {data: 'condicion_documento',
                    "searchable": false,
                    //"orderable":false,
                    "render": function (data, type, row) {
            
                    if (row.condicion_documento === '0')
                        return 'Activo';
                    else 
                        return 'Inactivo';
            
                    }
            
                },
                {data: 'action', "orderable": false, searchable: false},
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
       
            // EL DOBLE CLICK
            
            if(click){
                //alert("Ya clickeaste mrd");
            } else {
                
                click = true;

                    var ruta = $('#archivo_documento').val();
                    var solo_nombre = ruta.substr(ruta.lastIndexOf('\\') + 1).split('.')[0];
                    var extension = ruta.substr(ruta.lastIndexOf('.') + 1);
                   
                    

                // TOKEN
                var token = $("input[name=_token]").val();

                var ruta = "{{ route('documento.store') }}";

                //var datos = $('#form').serialize();
                //archivo_documento="+archivo+ "&
                //var datos = "descripcion_documento="+nombre+ "&condicion_documento="+condicion;

                // Obtendo formulario
                var form = $('#form')[0];

                // Crea un FormData Object
                var datos = new FormData(form);

                $.ajax({
                    url: ruta,
                    headers: {'X-CSRF-TOKEN': token},
                    type: 'post',
                    //datatype: 'json',
                    processData: false,
                    contentType: false,
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
                        
                        $("#Guardar").prop("disabled", true);
                    },
                    error: function(data){
                        
                        if(data.responseJSON.errors.descripcion_documento != null){
                            $('.id-descripcion').addClass('is-invalid');
                            $("#mensaje-error-descripcion").html(data.responseJSON.errors.descripcion_documento);
                        } else {
                            $('.id-descripcion').removeClass('is-invalid');
                            $("#mensaje-error-descripcion").html('');
                        }
                            
                        if(data.responseJSON.errors.archivo_documento != null){
                            //$('#nombre-fichero').hide();

                            $('.id-archivo').addClass('is-invalid');
                            $("#mensaje-error-archivo").html(data.responseJSON.errors.archivo_documento);
                            
                        } else {
                            //$('#nombre-fichero').show();
                            
                            $('.id-archivo').removeClass('is-invalid');
                            $("#mensaje-error-archivo").html('');    
                        }
                        console.log(data.responseJSON.errors);
                        $("#campo-alertas").fadeIn();

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
                        
                        if(data.responseJSON.errors.descripcion_documento != null){
                            $('.id-descripcion').addClass('is-invalid');
                            $("#mensaje-error-descripcion").html(data.responseJSON.errors.descripcion_documento);
                        }
                        
                        click=false;
                    }
                });
            }
        
        });

    });

    // ELIMINAR
    var Eliminar = function(id,nom){

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
                title: "¿Desea eliminar el archivo "+ nom + "?",
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

        // LOS CAMPOS DE ERROR
        $('.id-descripcion').removeClass('is-invalid');
        $("#mensaje-error-descripcion").html('');
        $('.id-archivo').removeClass('is-invalid');
        $("#mensaje-error-archivo").html(''); 

        // EN EL FILE
        $('#nombre-fichero').text('Sin seleccionar archivo... ');
        $('#visorDoc').hide();
        
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
