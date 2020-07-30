
<td>
    <a href="documentos/" class="btn btn-warning btn-icon rounded-circle" download>
        <i class="fal fa-download"></i>
    </a>
</td>

<td>
    <a href="#" onclick="Mostrar({{$id_documento}})" class="btn btn-success btn-icon rounded-circle class_a_href" data-toggle="modal" data-target="#default-example-modal">
        <i class="fal fa-edit"></i>
    </a>
</td>

<td>
    <a href="#" onclick="Eliminar({{$id_documento}})" class="btn btn-danger btn-icon rounded-circle">
        <i class="fal fa-times"></i>
    </a>
</td>

<!-- TODO: INHABILITAR ENLACE-->
<style>
    a.class_a_href{
        pointer-events: none;
        cursor: default;
    }
</style>
