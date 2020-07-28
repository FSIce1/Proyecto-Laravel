<div class="panel-content">

    <div class="form-row">

        <div class="col-md-6 mb-3">
            {!! Form::label('Nombre') !!}
            {!! Form::text('nombre_marca', null, ['id' => 'nombre_marca', 'class' => 'form-control id-nombre',
            'placeholder' => 'Nike...']) !!}
            
            @error('nombre_marca')
                <script>
                    $('.id-nombre').addClass('is-invalid')
                </script>

                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>
        
    </div>

</div>

<div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center">
</div>