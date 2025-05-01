@extends('adminlte::page')

@section('title', 'Redes Sociales')

@section('content_header')
    <h1>Redes Sociales</h1>
@stop

@section('content')

    <dir class="card">
        <dir class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Red Social</th>
                        <th>Url</th>
                        <th>Documento</th>
                        <th>Cambio</th>
                        <th colspan="1"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sociales as $social)
                        <tr>
                            <td>{{ $social->id }}</td>
                            <td>{{ $social->redsocial }}</td>
                            <td>
                                <a href="{{ $social->url }}" target="_blank">{{ $social->url }}</a>
                            </td>
                            <td>
                                @if ($social->pdf)
                                    <a href="{{ asset('storage/socialpdf/' . $social->pdf) }}" class="btn btn-danger" target="_blank">
                                        <i class="bi bi-file-pdf"></i>
                                    </a>
                                @else
                                    No hay pdf
                                @endif
                            </td>
                            <td>{{ $social->login }}</td>
                            @can('admin.social.edit')
                                <td width="10px">
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.social.edit',$social) }}">Editar</a>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </dir>
    </dir>
@stop
@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Incluye SweetAlert y jQuery (si aún no están incluidos) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.all.min.js"></script>
    {{-- Select 2 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css">

    <style>
        .select-arrow {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            width: 0;
            height: 0;
            border-left: 4px solid transparent;
            border-right: 4px solid transparent;
            border-bottom: 4px solid black;
        }
    </style>
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
@stop
