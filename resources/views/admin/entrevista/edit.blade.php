@extends('adminlte::page')

@section('title', 'Editar Entrevista')

@section('css')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <!-- Incluye SweetAlert y jQuery (si aún no están incluidos) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.all.min.js"></script>
    <style>
        .select2-selection {
            height: calc(1.5em + .75rem + 2px) !important;
        }

    </style>
@endsection

@section('content_header')
    <br>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Actualizar <small>Entrevista</small></h3>
                    </div>
                    {!! Form::model($entrevistum,['route' => ['admin.entrevista.update',$entrevistum],'method' => 'put', 'id' => 'form-guardar-cambios','enctype' => 'multipart/form-data']) !!}
                        <div class="card-body">
                            <div class="form-group">
                                {!! Form::label('title', 'Título:') !!}
                                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el título']) !!}
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        {!! Form::label('fondo', 'Imagen que se mostrará en el post') !!}
                                        {!! Form::file('fondo', ['class' => 'form-control-file','accept'=>'image/*']) !!}
                                        @error('fondo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('url', 'Url:') !!}
                                {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la url']) !!}
                                @error('url')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {!! Form::label('estado', 'Estado') !!}
                                {!! Form::select('estado', ['1' => 'Activo', '0' => 'Inactivo'], null, ['class' => 'form-control']) !!}
                                @error('estado')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {!! Form::label('descripcion', 'Descripción:') !!}
                                {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la descripción','rows' => 2]) !!}
                                @error('descripcion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            {!! Form::button('Guardar', ['class' => 'btn btn-success', 'onclick' => 'confirmarGuardarCambios()']) !!}
                            <a href="{{ route('admin.entrevista.index') }}" class="btn btn-danger ml-auto">Regresar</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // Función para mostrar la alerta de confirmación al hacer clic en el botón "Guardar cambios"
        function confirmarGuardarCambios() {
            // Mostrar ventana emergente de confirmación de SweetAlert
            Swal.fire({
                title: "¿Estás seguro?",
                text: "Puede que afecte algunas vistas",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, guardar cambios"
            }).then((result) => {
                // Si el usuario confirma, enviar el formulario
                if (result.isConfirmed) {
                    document.getElementById('form-guardar-cambios').submit(); // Enviar el formulario
                }
            });
        }
    </script>
@endsection
