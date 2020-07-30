@extends('layouts.smart')

@section('modo', 'Listado')

@section('titulo', 'Área')

@section('titulo-ref', 'Lista de Áreas')

@section('texto','busca, elimina, modifica, exporta en las siguiente lista')

@section('contenido-modal')
    
    <div class="modal fade" id="default-example-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                {!! Form::open(['id' => 'form']) !!}

                <div class="modal-header">
                    <h4 id="tituloModal" name="tituloModal" class="modal-title">
                        Agregar Área
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

                        {!! Form::hidden('id_area', null, ['id' => 'id_area']) !!}
                    
                        {!! Form::text('nombre_marca', null, ['id' => 'nombre_area', 'class' => 'form-control',
                        'placeholder' => 'Ingrese Área...']) !!}
    
                        {!! Form::hidden('condicion_area', '0', ['id' => 'condicion_area']) !!}
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

           <div id="lista-areas">

           </div>
           
           <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
            <thead class="bg-primary-600">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
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
                    <th>Nombre</th>
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

            // TODO: FORMA 2

            /*
            'serverSide': true,
            "ajax": "{{ url('api/listall') }}",
            "columns": [
                {data: 'id_area'},
                {data: 'nombre_area'},
                {data: 'condicion_area'},
            ],
            */

            // TODO: FORMA 3

            'processing':true,
            'serverSide': true,
            "ajax": "{{ route('area.listar') }}",
            "columns": [
                {data: 'id_area'},
                {data: 'nombre_area'},
                {data: 'condicion_area',
                    "searchable": false,
                    "orderable":false,
                    "render": function (data, type, row) {
            
                    if (row.condicion_area === 0)
                        return 'Activo';
                    else 
                        return 'Inactivo';
            
                    }
            
                },
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
                var nombre = $("#nombre_area").val();
                var condicion = $("#condicion_area").val();
                
                // TOKEN
                var token = $("input[name=_token]").val();

                var ruta = "{{ route('area.store') }}";

                //var datos = $('#form').serialize();
                var datos = "nombre_area="+nombre+"&condicion_area="+condicion;

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
                                title: "Área insertada correctamente",
                                showConfirmButton: false,
                                timer: 1500
                            });

                        } else {
                            Swal.fire({
                                type: "error",
                                title: "Área no pudo ser insertada",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    },
                    error: function(data){
                        //console.log('ERROR',data.responseJSON.nombre_area);
                        //alert(data.responseJSON.errors.nombre_area);
                        $("#mensaje-error").html(data.responseJSON.errors.nombre_area);
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
                var id = $("#id_area").val();
                var nombre = $("#nombre_area").val();
                var condicion = $("#condicion_area").val();
                
                // TOKEN
                var token = $("input[name=_token]").val();

                var ruta = "{{url('area')}}/"+id+"";

                //var datos = $('#form').serialize();
                var datos = "id_area="+id+"&nombre_area="+nombre+"&condicion_area="+condicion;

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
                                title: "Área modificada correctamente",
                                showConfirmButton: false,
                                timer: 1500
                            });

                        } else {
                            Swal.fire({
                                type: "error",
                                title: "Área no pudo ser modificada",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    },
                    error: function(data){
                        //console.log('ERROR',data.responseJSON.nombre_area);
                        //alert(data.responseJSON.errors.nombre_area);
                        $("#mensaje-error").html(data.responseJSON.errors.nombre_area);
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
                    var ruta = "{{url('area')}}/"+id+"";

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
                            //console.log('ERROR',data.responseJSON.nombre_area);
                            //alert(data.responseJSON.errors.nombre_area);
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
            
            document.getElementById("tituloModal").innerHTML = "Nueva Área";
            $("#condicion_area").val('0');
            
            $("#Guardar").show();
            $("#Modificar").hide();
        } else {
            
            document.getElementById("tituloModal").innerHTML = "Modificar Área";
            
            $("#Guardar").hide(); 
            $("#Modificar").show();
            var route = "{{url('area')}}/"+id+"/edit";

            $.get(route, function(data){
                $("#id_area").val(data.id_area);
                $("#nombre_area").val(data.nombre_area);
                $("#condicion_area").val(data.condicion_area);
            });

        }
        
        $("#nombre_area").focus();

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

    // TODO: FORMA 1
    var lista = function(){

        $.ajax({
            type:'get',
            url: '{{ url('listall') }}',
            success: function(data){
                $('#lista-areas').empty().html(data);
            }
        });
        
    }

    </script>

    <!-- PARA LOS CLICKS-->
    <script src="https://rawgit.com/jeresig/jquery.hotkeys/master/jquery.hotkeys.js"></script>

@endsection
