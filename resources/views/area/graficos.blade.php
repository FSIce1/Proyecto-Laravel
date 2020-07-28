@extends('layouts.smart')

@section('styles')
    <link rel="stylesheet" media="screen, print" href="{{ asset('css/statistics/chartjs/chartjs.css') }}">
@endsection

@section('modo', 'Gráficos')

@section('titulo', 'Área')

@section('titulo-ref', 'Gráficos de Áreas')

@section('texto','estadísticas actuales sobre los graficos')

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
            
            <div class="panel-tag">
                LE HICE DE MARCAS PORQUE ÁREAS TIENE MUCHOS DATOS :V
            </div>

            <div id="pieChart">
                <canvas style="width:100%; height:300px;"></canvas>
            </div>

            <div id="polarArea">
                <canvas style="width:100%; height:300px;"></canvas>
            </div>

        </div>

    </div>
@endsection

@section('scripts')

    <script>

        $(document).ready(function() {
            //polarArea();
            pieChart();
        });

        /* pie chart */
        var pieChart = function()
            {
                var config = {
                    type: 'pie',
                    data:
                    {
                        datasets: [
                        {
                            data: [
                                @foreach($marcas as $marca)
                                {{ $marca->id_marca }},
                                @endforeach
                            ],
                            backgroundColor: [
                                myapp_get_color.primary_200,
                                myapp_get_color.primary_400,
                                myapp_get_color.success_50,
                                myapp_get_color.success_300,
                                myapp_get_color.success_500
                            ],
                            label: 'My dataset' // for legend
                        }],
                        labels: [
                            @foreach($marcas as $marca)
                            '{{ $marca->nombre_marca }}',
                            @endforeach
                        ]
                    },
                    options:
                    {
                        responsive: true,
                        legend:
                        {
                            display: true,
                            position: 'bottom',
                        }
                    }
                };
                new Chart($("#pieChart > canvas").get(0).getContext("2d"), config);
            }
            /* pie chart -- end */


        var polarArea = function(){
            var config = {
                type: 'polarArea',
                data:
                {
                    datasets: [
                    {
                        data: [
                            11,
                            16,
                            7,
                            3,
                            14
                        ],
                        backgroundColor: [
                            myapp_get_color.primary_200,
                            myapp_get_color.primary_400,
                            myapp_get_color.success_100,
                            myapp_get_color.success_400,
                            myapp_get_color.success_600
                        ],
                        label: 'My dataset' // for legend
                    }],
                    labels: [
                        "USA",
                        "Germany",
                        "Austalia",
                        "Canada",
                        "France"
                    ]
                },
                options:
                {
                    responsive: true,
                    legend:
                    {
                        display: true,
                        position: 'bottom',
                    }
                }
            };
            new Chart($("#polarArea > canvas").get(0).getContext("2d"), config);
        }

    </script>


    <!-- plugin Chart.js : MIT license -->
    <script src="{{ asset('js/statistics/chartjs/chartjs.bundle.js') }}"></script>
    
    <!-- PARA LOS CLICKS-->
    <script src="https://rawgit.com/jeresig/jquery.hotkeys/master/jquery.hotkeys.js"></script>

@endsection
