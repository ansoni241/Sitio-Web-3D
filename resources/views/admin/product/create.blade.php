@extends('adminlte::page')

@section('title', 'Crear producto')

@section('content_header')

@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Crear <small>nuevo producto</small></h3>
                    </div>
                    {!! Form::open(['route' => 'admin.product.store','files'=> true ]) !!}

                        @include('admin.product.partials.form')
                        <div class="card-body">
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
                            {!! Form::submit('Crear Producto', ['class'=> 'btn btn-primary']) !!}
                            <a href="{{ route('admin.product.index') }}" class="btn btn-danger ml-auto">Regresar</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
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
@stop
