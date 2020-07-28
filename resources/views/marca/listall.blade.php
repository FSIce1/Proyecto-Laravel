
<!-- INICIO LISTA -->
<table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
    <thead class="bg-primary-600">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>

        @foreach($marcas as $marca)
            <tr>
                <td>{{ $marca->id_marca }}</td>
                <td>{{ $marca->nombre_marca }}</td>

                <td>
                    <a href="{{route('marca.edit',$marca->id_marca)}}" class="btn btn-success btn-icon rounded-circle">
                        <i class="fal fa-edit"></i>
                    </a>
                </td>

                <td>
                    <a href="{{route('marca.show',$marca->id_marca)}}" class="btn btn-danger btn-icon rounded-circle">
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
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
    </tfoot>
</table>
<!-- FIN LISTA -->
