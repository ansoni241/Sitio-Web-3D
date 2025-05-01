@extends('adminlte::page')

@section('title', 'Noticias')

@section('content_header')
    <h1>Noticias</h1>
@stop

@section('content')
    <div class="card">
        @can('admin.reportage.create')
            <div class="card-header">
                <a  class="btn btn-success" href="{{ route('admin.reportage.create') }}">Agregar Noticia</a>
            </div>
        @endcan
        <div class="card-body">
            <table id="noticias" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nro.</th>
                        <th>Fecha</th>
                        <th>Descripcion</th>
                        <th>Imagen</th>
                        <th>Cambio</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reportages as $noticias)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $noticias->fecha }}</td>
                            <td>{{ $noticias->descripcion }}</td>
                            {{-- <td>{{ $productos->file }}</td> --}}
                            <td>
                                @if ($noticias->file)
                                    <a href="{{ asset('storage/news/' . $noticias->file) }}" target="_blank" data-fancybox="images">
                                        <img src="{{ asset('storage/news/' . $noticias->file) }}" alt="Imagen del producto" style="max-width: 50px; max-height: 50px;">
                                    </a>
                                @else
                                    No hay imagen
                                @endif
                            </td>
                            <td>{{ $noticias->login }}</td>
                            @can('admin.reportage.edit')
                                <td width="10px">
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.reportage.edit',$noticias) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            @endcan
                            <td width="10px">
                                    @can('admin.reportage.destroy')
                                        <form action="{{ route('admin.reportage.destroy',$noticias)}}" method="post">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                                        </form>
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
        $('#noticias').DataTable({
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
