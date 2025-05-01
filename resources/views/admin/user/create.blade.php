@extends('adminlte::page')

@section('title', 'Crear Usuario')

{{-- @section('plugins.Sweetalert2',true) --}}
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-selection {
            height: calc(1.5em + .75rem + 2px) !important;
        }

    </style>

@endsection

@section('content_header')
    {{-- <h1>Registrar Usuario</h1> --}}
    <br>
@stop

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="container-fluid">
        <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Registrar <small>Usuario</small></h3>
                </div>
                {!! Form::open(['route' => 'admin.user.store']) !!}
                    <div class="card-body">
                        <div class="form-group">
                            {!! Form::label('email', 'Correo:') !!}
                            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su correo']) !!}
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    {!! Form::label('name', 'Nombre Completo:') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre de usuario']) !!}
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    {!! Form::label('celular', 'Celular:') !!}
                                    {!! Form::text('celular', null, ['class' => 'form-control solo-enteros', 'maxlength' => '8', 'placeholder' => 'Ingrese número celular']) !!}
                                    <span id="celular-error" class="text-danger"></span>
                                    @error('celular')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    {!! Form::label('estado', 'Estado:') !!}
                                    {!! Form::select('estado', ['1' => 'Activo', '0' => 'Inactivo'], null, ['class' => 'form-control']) !!}
                                    @error('estado')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer d-flex justify-content-between">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
                        <a href="{{ route('admin.user.index') }}" class="btn btn-danger ml-auto">Regresar</a>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        @if(Session::has('info'))
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{ Session::get('info') }}",
                showConfirmButton: false,
                timer: 2500
            });
        @endif
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // Este script permite ingresar solo números enteros y limita la cantidad de caracteres a 8 en tiempo real
        document.addEventListener("DOMContentLoaded", function() {
            var celularInput = document.querySelector('.solo-enteros');
            var celularError = document.getElementById('celular-error');

            celularInput.addEventListener('input', function(e) {
                // Removemos todos los caracteres no numéricos
                this.value = this.value.replace(/\D/g, '');

                // Limitamos la cantidad de caracteres a 8
                if (this.value.length > 8) {
                    this.value = this.value.slice(0, 8);
                }

                // Verificamos que el primer número sea 6, 7 o 4
                if (!/^[674]/.test(this.value.charAt(0))) {
                    celularError.textContent = 'El primer dígito debe ser 6, 7 o 4.';
                } else {
                    celularError.textContent = '';
                }

                // Actualizamos el mensaje de error si el valor ingresado no es un número entero
                if (!/^\d*$/.test(this.value)) {
                    celularError.textContent = 'Por favor, ingrese solo números enteros.';
                } else {
                    celularError.textContent = '';
                }
            });
        });
    </script>
@stop
