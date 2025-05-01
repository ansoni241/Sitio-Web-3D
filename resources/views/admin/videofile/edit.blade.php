@extends('adminlte::page')

@section('title', 'Crear Video')

@section('css')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
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
                        <h3 class="card-title">Actualizar <small>Video</small></h3>
                    </div>
                    {!! Form::model($videofile,['route' => ['admin.videofile.update',$videofile],'method' => 'put','enctype' => 'multipart/form-data']) !!}
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
                                        {!! Form::label('video_fondo', 'Imagen que se mostrará en el post') !!}
                                        {!! Form::file('video_fondo', ['class' => 'form-control-file','accept'=>'image/*']) !!}
                                        @error('video_fondo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        {!! Form::label('video_file', 'Archivo multimedia') !!}
                                        {!! Form::file('video_file', ['class' => 'form-control-file','accept'=>'video/*']) !!}
                                        @error('video_file')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
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
                            {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
                            <a href="{{ route('admin.videofile.index') }}" class="btn btn-danger ml-auto">Regresar</a>
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
@endsection
