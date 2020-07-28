@extends('layouts.smart')


@section('modo', 'Listado')

@section('titulo', 'Producto')

@section('titulo-ref', 'Lista de Productos')

@section('texto','busca, elimina, modifica, exporta en las siguiente lista')

@section('contenido-modal')
    <div class="modal fade" id="default-example-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            
            <div class="modal-content">

                <div class="modal-header">
                    <h4 id="tituloModal" name="tituloModal" class="modal-title">
                        Agregar Producto
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fal fa-user fs-xl"></i></span>
                        </div>
                        <input id="nombre_producto" name="nombre_producto" type="text" class="form-control" placeholder="Nombre..."
                            aria-label="Username" maxlength="30" required aria-describedby="addon-wrapping-left">
                    </div>

                    <input type="text" id="id_producto" name="id_producto">

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button id="btnGuardar" type="submit" class="btn btn-primary" name="btnGuardar">Guardar</button>
                </div>

            </div>

        </div>
    </div>
@endsection

@section('contenido-lista')
    <div class="panel-container show">

        <div class="panel-content">

            <div class="frame-wrap">
                <div class="demo">
                    <a href="producto/create" class="btn btn-outline-success">Nuevo</a>
                </div>
            </div>

            @include('utiles.mensaje')

            <!-- INICIO LISTA -->
            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                <thead class="bg-primary-600">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Marca</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($productos as $producto)
                        <tr>
                            <td>{{ $producto->id_producto }}</td>
                            <td>{{ $producto->nombre_producto }}</td>
                            <td>{{ $producto->precio_producto }}</td>
                            <td>{{ $producto->nombre }}</td>

                            <td>
                                <a href="{{route('producto.edit',$producto->id_producto)}}" class="btn btn-success btn-icon rounded-circle">
                                    <i class="fal fa-edit"></i>
                                </a>
                            </td>

                            <td>
                                <a href="{{route('producto.show',$producto->id_producto)}}" class="btn btn-danger btn-icon rounded-circle">
                                    <i class="fal fa-times"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>

                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Marca</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </tfoot>
            </table>
            <!-- FIN LISTA -->


        </div>

    </div>
@endsection

@section('scripts')

    <script>
        $(document).ready(function() {

            // INICIALIZO
            
            $('#dt-basic-example').dataTable({
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
                        titleAttr: 'Generate PDF',
                        className: 'btn-outline-danger btn-sm mr-1'
                    },
                    {
                        extend: 'excelHtml5',
                        text: 'Excel',
                        titleAttr: 'Generate Excel',
                        className: 'btn-outline-success btn-sm mr-1'
                    },
                    {
                        extend: 'csvHtml5',
                        text: 'CSV',
                        titleAttr: 'Generate CSV',
                        className: 'btn-outline-primary btn-sm mr-1'
                    },
                    {
                        extend: 'copyHtml5',
                        text: 'Copy',
                        titleAttr: 'Copy to clipboard',
                        className: 'btn-outline-primary btn-sm mr-1'
                    },
                    {
                        extend: 'print',
                        text: 'Print',
                        titleAttr: 'Print Table',
                        className: 'btn-outline-primary btn-sm'
                    }
                ]
            });

        });

    </script>

    <script>
        function showFunctionModal(id, nombre, precio, marca,accion) {


            document.getElementById("id_producto").value = id;
            document.getElementById("nombre_producto").value = nombre;
            document.getElementById("precio_producto").value = precio;

            if (accion == 'Nuevo') {

                document.getElementById("btnGuardar").innerHTML = "Registrar";
                document.getElementById("tituloModal").innerHTML = "Nuevo Producto";

            } else if (accion == "Modificar") {

                document.getElementById("btnGuardar").innerHTML = "Modificar";
                document.getElementById("tituloModal").innerHTML = "Modificar Producto";

            }

        }

    </script>

@endsection
