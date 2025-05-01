@extends('adminlte::page')

@section('title', 'Videos')

{{-- @section('plugins.Sweetalert2',true) --}}

@section('content_header')
    <h1>Videos</h1>
@stop

@section('content')

    <div class="card">
        {{-- @can('admin.videofile.create') --}}
            <div class="card-header">
                <a  class="btn btn-success" href="{{ route('admin.videofile.create') }}">Agregar video</a>
            </div>
        {{-- @endcan --}}
        <div class="card">
            <div class="card-body">
                <table id="productos" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Imagen</th>
                            <th>Cambio</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($videos as $video)
                            <tr>
                                <td>{{ $video->id }}</td>
                                <td>{{ $video->title }}</td>
                                <td>{{ $video->descripcion }}</td>
                                <td class="text-center" width="10px">
                                    @if($video->estado === 1)
                                        <span class="badge badge-success">Activo</span>
                                    @else
                                        <span class="badge badge-danger">Inactivo</span>
                                    @endif
                                </td>
                                <td width="10px">
                                    @if ($video->video_fondo)
                                        <a href="{{ asset('storage/video/' . $video->video_fondo) }}" target="_blank" data-fancybox="images">
                                            <img src="{{ asset('storage/video/' . $video->video_fondo) }}" alt="Imagen" style="max-width: 50px; max-height: 50px;">
                                        </a>
                                    @else
                                        No hay imagen
                                    @endif
                                </td>
                                <td>{{ $video->login }}</td>
                                {{-- @can('admin.videofile.edit') --}}
                                    <td width="10px">
                                        <a class="btn btn-primary btn-sm" href="{{ route('admin.videofile.edit',$video) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                {{-- @endcan --}}
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Imagen</th>
                            <th>Cambio</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@stop
@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">
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
    {{-- <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>

    <script>
        $('#productos').DataTable({
            responsive: true,
            autoWidth: false,
            ordering: false,

            "language": {
            // "lengthMenu": "Mostrar _MENU_ registros por página",
            "lengthMenu": "Mostrar "+
                            `<select class="custom-select custom-select-sm form-control form-control-sm">
                                <option value = '10'>10</option>
                                <option value = '25'>25</option>
                                <option value = '50'>50</option>
                                <option value = '100'>100</option>
                                <option value = '-1'>Todos</option>
                                </select>`+" registros por página",

            "zeroRecords": "Nada encontrado - disculpa",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            'search': 'Buscar:',
            "paginate":{
                'next':'Siguiente' ,
                'previous':'Anterior',
            }
            }
        });
    </script>
@stop
