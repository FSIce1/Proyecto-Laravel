<!--
<td>
    <a href="javascript:window.open('archivos/{{$nombre_documento}}');" target="_blank" class="btn btn-dark btn-icon rounded-circle">
        <i class="fal fa-eject"></i>
    </a>
</td>
EL btn-sm es para el tamaño minúsculo
-->

<td>
    <a href="{{asset("archivos/$nombre_documento")}}" target="_blank" class="btn btn-dark btn-sm btn-icon rounded-circle">
        <i class="fal fa-eject"></i>
    </a>
</td>
              
<td>
    <a href="archivos/{{$nombre_documento}}" class="btn btn-warning btn-sm btn-icon rounded-circle" download>
        <i class="fal fa-download"></i>
    </a>
</td>

<td>
    <a href="#" onclick="Mostrar({{$id_documento}})" class="btn btn-success btn-sm btn-icon rounded-circle class_a_href" data-toggle="modal" data-target="#default-example-modal">
        <i class="fal fa-edit"></i>
    </a>
</td>

<td>
    <a href="#" onclick="Eliminar({{$id_documento}},'{{$nombre_documento}}')" class="btn btn-danger btn-sm btn-icon rounded-circle">
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
