@extends('layouts.smart')

@section('styles')
    <link rel="stylesheet" media="screen, print" href="{{ asset('css/statistics/chartjs/chartjs.css') }}">
@endsection

@section('modo', 'Gráficos')

@section('titulo', 'Documento')

@section('titulo-ref', 'Gráficos de Documentos')

@section('texto','estadísticas actuales sobre los graficos')

@section('contenido-lista')
    <div class="panel-container show">

        <div class="panel-content">
            
            <div class="panel-tag">
                Gráfico de prueba - Documentos
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

        var pieChart = function(){
            var config = {
                type: 'pie',
                data:
                {
                    datasets: [
                    {
                        data: [
                            @foreach($documentos as $documento)
                            {{ $documento->id_documento }},
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
                        @foreach($documentos as $documento)
                        '{{ $documento->nombre_documento }}',
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
