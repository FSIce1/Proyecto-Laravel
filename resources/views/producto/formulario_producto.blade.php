
<div class="panel-content">
    <div class="form-row">

        <div class="col-md-6 mb-3">
            {!! Form::label('Nombre') !!}
            {!! Form::text('nombre_producto', null, ['id' => 'nombre_producto', 'class' => 'form-control id-nombre',
            'placeholder' => 'Camisa Azul...']) !!}
            <!--
            <div class="valid-feedback">
                Correcto!
            </div>
            <div class="invalid-feedback">
                Incorrecto!
            </div>
            -->
            @error('nombre_producto')
                <script>
                    $('.id-nombre').addClass('is-invalid')
                </script>

                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>
        
    </div>

    <div class="form-row">
        <div class="col-md-6 mb-3">
            {!! Form::label('Precio') !!}
            {!! Form::number('precio_producto', null, ['id' => 'precio_producto','class' => 'form-control id-precio', 'step' => 'any', 'placeholder' => '41.37']) !!}

            <!--
            <div class="valid-feedback">
                Correcto!
            </div>
            <div class="invalid-feedback">
                Incorrecto!
            </div>
            -->
            @error('precio_producto')
                <script>
                    $('.id-precio').addClass('is-invalid')
                </script>

                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>
    </div>

    <div class="form-row">
        <div class="col-md-6 mb-3">
            {!! Form::label('Marca') !!}
            {!! Form::select('id_marca_fk', $marcas, null, ['id' => 'id_marca_fk', 'class' =>
            'form-control id-marca']) !!}
            <!--id_marca_fk
            <div class="valid-feedback">
                Correcto!
            </div>
            <div class="invalid-feedback">
                Incorrecto!
            </div>
            -->
            
            @error('id_marca_fk')
                <script>
                    $('.id-marca').addClass('is-invalid')
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

<!-- 

            {!! Form::text('precio_producto', null, ['id' => 'precio_producto', 'class' => 'form-control',
            'placeholder' => 'Ingrese precio...', 'required']) !!}
-->