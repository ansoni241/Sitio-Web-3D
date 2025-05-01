@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Productos</h1>
@stop

@section('content')
    <div class="card">
        @can('admin.product.create')
            <div class="card-header">
                <a  class="btn btn-success" href="{{ route('admin.product.create') }}">Agregar Producto</a>
            </div>
        @endcan
        <div class="card-body">
            <table id="productos" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nro.</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Fisura</th>
                        <th>Descuento</th>
                        <th>Estado</th>
                        <th>Imagen</th>
                        <th>Documento</th>
                        <th>Cambio</th>
                        <th colspan="1"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $productos)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $productos->nombre }}</td>
                            <td>{{ $productos->descripcion }}</td>
                            <td>{{ $productos->fisura }}</td>
                            <td class="text-center">{{ $productos->descuento }} %</td>
                            <td class="text-center">
                                @if($productos->estado === 1)
                                    <span class="badge badge-success">Activo</span>
                                @else
                                    <span class="badge badge-danger">Inactivo</span>
                                @endif
                            </td>
                            <td>
                                @if ($productos->file)
                                    <a href="{{ asset('storage/product/' . $productos->file) }}" target="_blank" data-fancybox="images">
                                        <img src="{{ asset('storage/product/' . $productos->file) }}" alt="Imagen del producto" style="max-width: 50px; max-height: 50px;">
                                    </a>
                                @else
                                    No hay imagen
                                @endif
                            </td>
                            <td>
                                @if ($productos->pdf)
                                    <a href="{{ asset('storage/productpdf/' . $productos->pdf) }}" class="btn btn-danger" target="_blank">
                                        <i class="bi bi-file-pdf"></i>
                                    </a>
                                @else
                                    No hay pdf
                                @endif
                            </td>
                            <td>{{ $productos->login }}</td>
                            <td width="10px">
                                @can('admin.product.edit')
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.product.edit',$productos) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
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
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>
    <script>
        $('#productos').DataTable({
            responsive: true,
            autoWidth: false,

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
