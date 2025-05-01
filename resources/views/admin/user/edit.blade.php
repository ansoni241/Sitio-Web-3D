@extends('adminlte::page')

@section('title', 'Admin')

{{-- @section('plugins.Sweetalert2',true) --}}

@section('content_header')
    <h1>Asignar un rol</h1>
@stop

@section('content')
    @if (session('warning'))
        <div class="alert alert-warning">
            <strong>{{ session('warning') }}</strong>
        </div>
    @endif

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre:</p>
            <p class="form-control">{{ $user->name }}</p>

            <h2 class="h5">Listado de roles y Estado</h2>
            {!! Form::model($user, ['route'=>['admin.user.update',$user], 'method'=> 'put']) !!}
                @foreach ($roles as $role)
                    <div>
                        <label>
                            {!! Form::checkbox('roles[]', $role->id, null, ['class'=> 'mr-1']) !!}
                            {{ $role->name }}
                        </label>
                    </div>
                @endforeach
                <div class="form-group">
                    {!! Form::label('estado', 'Estado') !!}
                    {!! Form::select('estado', ['1' => 'Activo', '0' => 'Inactivo'], null, ['class' => 'form-control']) !!}
                    @error('estado')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                {{-- {!! Form::submit('Guardar cambio', ['class'=> 'btn btn-primary mt-2']) !!} --}}
                <div class="card-footer d-flex justify-content-between align-items-center">
                    {!! Form::submit('Guardar cambio', ['class'=> 'btn btn-primary mt-2']) !!}
                    <a href="{{ route('admin.user.index') }}" class="btn btn-danger ml-auto">Regresar</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
