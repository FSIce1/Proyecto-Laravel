
@if (Session::has('guardar'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="fal fa-times"></i></span>
        </button>
        <strong>{{Session::get('guardar')}}</strong> 
    </div>
@endif

@if (Session::has('modificar'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="fal fa-times-square"></i></span>
        </button>
        <strong>{{Session::get('modificar')}}</strong>
    </div>    
@endif

@if (Session::has('eliminar'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="fal fa-trash-alt"></i></span>
    </button>
    <strong>{{Session::get('eliminar')}}</strong>
</div>
@endif