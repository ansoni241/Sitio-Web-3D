@extends('adminlte::page')

@section('title', 'Editar producto')


@section('content_header')

@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Actualizar <small>producto</small></h3>
                    </div>
                    {!! Form::model($product,['route' => ['admin.product.update',$product],'method' => 'put', 'id' => 'form-guardar-cambios','enctype' => 'multipart/form-data']) !!}

                        @include('admin.product.partials.form')
                        <div class="card-body">
                            <div class="form-group">
                                {!! Form::label('estado', 'Estado') !!}
                                {!! Form::select('estado', ['1' => 'Activo', '0' => 'Inactivo'], null, ['class' => 'form-control']) !!}
                                @error('estado')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            {!! Form::label('model', 'Modelo en 3D para el post, "Campo Opcional"') !!}
                                            {!! Form::file('model', ['class' => 'form-control-file','accept'=>'.glb']) !!}
                                            @error('model')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <br>
                                            <p>Por favor, selecciona un modelo 3D con extención .glb</p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            {!! Form::label('pdf', 'Ingrese el Documento') !!}
                                            {!! Form::file('pdf', ['class' => 'form-control-file','accept'=>'.pdf']) !!}
                                            @error('pdf')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <br>
                                            <p>Por favor, selecciona un Documento con extención .pdf</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            {!! Form::button('Actualizar Producto', ['class'=> 'btn btn-primary', 'onclick' => 'confirmarGuardarCambios()']) !!}
                            <a href="{{ route('admin.product.index') }}" class="btn btn-danger ml-auto">Regresar</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Incluye SweetAlert y jQuery (si aún no están incluidos) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.all.min.js"></script>
    <style>
        .select2-selection {
            height: calc(1.5em + .75rem + 2px) !important;
        }

    </style>
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }
        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        //cambiar imagen
        document.getElementById("file").addEventListener('change', cambiarImagen);
        function cambiarImagen(event){
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
        }
        //End cambio de imagen
    </script>
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
@stop
