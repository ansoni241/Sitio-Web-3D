@extends('adminlte::page')

@section('title', 'Inicio')

{{-- @section('plugins.Sweetalert2',true) --}}

@section('content_header')
    <h1>Bienvenido al Sistema de Administración</h1>
@stop

@section('content')
    {{-- Presentacion --}}
    <dir class="card">
        <div class="card-body">
            <p>Quisiera expresar nuestro más sincero agradecimiento por elegir utilizar nuestro panel de Administración. Nos complace enormemente que hayas optado por nuestra plataforma para gestionar tus actividades.
            Si en algún momento surge alguna pregunta o necesitas asistencia, no dudes en ponerte en contacto con nosotros. Estamos aquí para ayudarte en todo lo que necesites. <a href="https://wa.me/59176537648" target="_blank"><i class="bi bi-whatsapp text-success fs-10"></i></a>
            </p>
        </div>
    </dir>
    {{-- End Presentacion --}}
    <!-- Cuadro de informacion -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $cantidadVideos }}</h3>

                <p>Total Videos</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('admin.videofile.index') }}" class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $cantidadProductosActivos }}<sup style="font-size: 20px"></sup></h3>

                <p>Cantidad Productos Activos</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('admin.product.index') }}" class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $cantidadMensajes }}</h3>

                <p>Mensajes</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('admin.contactanos.index') }}" class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $cantidadNoticias }}</h3>

                <p>Notícias</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ route('admin.reportage.index') }}" class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        </div>
        {{-- END Cuadro de informacion --}}
        {{-- GRAFICOS DE BARRA --}}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <x-adminlte-card title="Noticas por Mes" theme="red" icon="fas fa-photo-video" removable collapsible>
                            <canvas id="noticiasmensuales"></canvas>
                        </x-adminlte-card>
                    </div>
                    <div class="col-md-6">
                        <x-adminlte-card title="Mensajes por Mes" theme="yellow" icon="fas fa-paper-plane" removable collapsible>
                            <canvas id="mensajesmensuales"></canvas>
                        </x-adminlte-card>
                    </div>
                </div>
            </div>
        </div>
        {{-- END GRAFICOS DE BARRA --}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@stop

@section('js')
    @if(Session::has('show_alert'))
    <script>
        Swal.fire({
        title: "¡Atención! Cualquier cambio realizado en el sistema puede tener un impacto significativo. Por favor, ten cuidado al realizar modificaciones.",
        text: "Queda advertido!",
        icon: "success"
        });
    </script>
    {{ Session::forget('show_alert') }} <!-- Eliminar la variable de sesión para que no se muestre nuevamente -->
    @endif
    <script>
        const ctx1 = document.querySelector('#noticiasmensuales').getContext('2d');
        const meses1 = {!! json_encode($noticiasgrafico->map(function ($item, $key) {
            return $item->mes;
        })) !!};

        const mesesNombres1 = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

        const mesesTraducidos1 = meses1.map(mes => mesesNombres1[mes - 1]);

        const stackedBar1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: mesesTraducidos1,
                datasets: [{
                    label: 'Noticias por Mes',
                    data: {!! json_encode($noticiasgrafico->pluck('total')) !!},
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 0.1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        stacked: true
                    },
                    y: {
                        stacked: true
                    }
                }
            }
        });
    </script>

    <script>
        const ctx2 = document.querySelector('#mensajesmensuales').getContext('2d');
        const meses2 = {!! json_encode($mensajesgrafico->map(function ($item, $key) {
            return $item->mes;
        })) !!};

        const mesesNombres2 = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

        const mesesTraducidos2 = meses2.map(mes => mesesNombres2[mes - 1]);

        const stackedBar2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: mesesTraducidos2,
                datasets: [{
                    label: 'Mensajes por Mes',
                    data: {!! json_encode($mensajesgrafico->pluck('total')) !!},
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 0.1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        stacked: true
                    },
                    y: {
                        stacked: true
                    }
                }
            }
        });
    </script>

@stop
