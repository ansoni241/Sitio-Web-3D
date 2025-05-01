@extends('adminlte::page')

@section('title', 'Log')

@section('content_header')
    <h1>Control de Log de Cambios de Datos</h1>
@stop

@section('content')

    <div class="card">
        <div class="card">
            <div class="card-body">
                <table id="productos" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nro.</th>
                            <th>Usuario</th>
                            <th>Cambio de Hora</th>
                            <th>IP</th>
                            <th>acción</th>
                            <th>Tabla</th>
                            <th>ID</th>
                            <th>Columna</th>
                            <th>Valor Antiguo</th>
                            <th>Nuevo Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($loggeneral as $log)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $log->user }}</td>
                                <td><span class="badge badge-light">{{ $log->change_time ? \Carbon\Carbon::parse($log->change_time)->format('d/m/Y H:i:s') : '' }}</span></td>
                                <td><span class="badge badge-warning">{{ $log->ip_address }}</span></td>
                                {{-- <td>{{ $log->action }}</td> --}}
                                <td class="text-center" width="10px">
                                    @if($log->action == 'INSERT')
                                        <span class="badge badge-success">{{ $log->action }}</span>
                                    @elseif($log->action == 'DELETE')
                                        <span class="badge badge-danger">{{ $log->action }}</span>
                                    @else
                                        <span class="badge badge-primary">{{ $log->action }}</span>
                                    @endif
                                </td>
                                <td><span class="badge badge-info">{{ $log->table_name }}</span></td>
                                <td>{{ $log->record_id }}</td>
                                <td><span class="badge badge-dark">{{ $log->column_name }}</span></td>
                                <td>{{ $log->old_value }}</td>
                                <td>{{ $log->new_value }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>

                            <th>Nro.</th>
                            <th>Usuario</th>
                            <th>Cambio de Hora</th>
                            <th>IP</th>
                            <th>acción</th>
                            <th>Tabla</th>
                            <th>ID</th>
                            <th>Columna</th>
                            <th>Valor Antiguo</th>
                            <th>Nuevo Valor</th>
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
        .word-wrap {
            word-wrap: break-word !important;
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
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>

    <script>
        $('#productos').DataTable({
            responsive: true,
            autoWidth: false,
            // ordering: false,

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
