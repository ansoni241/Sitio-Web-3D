@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>Editar URL</h1>
@stop

@section('content')
    <dir class="card">

        <div class="card-body">
            {!! Form::model($social,['route' => ['admin.social.update',$social],'method' => 'put','enctype' => 'multipart/form-data']) !!}

                @include('admin.social.partials.form')

                <div class="card-footer d-flex justify-content-between align-items-center">
                    {!! Form::submit('Actualizar URL', ['class'=> 'btn btn-primary']) !!}
                    <a href="{{ route('admin.social.index') }}" class="btn btn-danger ml-auto">Regresar</a>
                </div>
            {!! Form::close() !!}
        </div>
    </dir>
@stop

@section('css')

@stop

@section('js')

@stop
