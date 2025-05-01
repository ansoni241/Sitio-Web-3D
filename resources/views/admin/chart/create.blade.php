@extends('adminlte::page')

@section('title', 'Crear cuadro')

@section('content_header')
    <h1>Crear nueva cuadro</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            {!! Form::open(['route' => 'admin.chart.store','files'=> true ]) !!}

                @include('admin.chart.partials.form')

                <div class="card-footer d-flex justify-content-between align-items-center">
                    {!! Form::submit('Crear Cuadro', ['class'=> 'btn btn-primary']) !!}
                    <a href="{{ route('admin.chart.index') }}" class="btn btn-danger ml-auto">Regresar</a>
                </div>
            {!! Form::close() !!}
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
