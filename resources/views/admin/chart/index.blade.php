@extends('adminlte::page')

@section('title', 'Cuadro')

@section('content_header')
    <h1>Cuadro</h1>
@stop

@section('content')

    <div class="card">
        @can('admin.chart.create')
            <div class="card-header">
                <a  class="btn btn-success" href="{{ route('admin.chart.create') }}">Agregar cuadro</a>
            </div>
        @endcan
        <div class="card-body">
            <table id="chart" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Nro.</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Imagen</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($charts as $cuadro)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $cuadro->nombre }}</td>
                            <td class="text-center">
                                @if ($cuadro->file)
                                    <a href="{{ asset('storage/chart/' . $cuadro->file) }}" target="_blank" data-fancybox="images">
                                        <img src="{{ asset('storage/chart/' . $cuadro->file) }}" alt="Imagen del cuadro" style="max-width: 50px; max-height: 50px;">
                                    </a>
                                @else
                                    No hay imagen
                                @endif
                            </td>
                            @can('admin.chart.edit')
                                <td width="10px">
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.chart.edit',$cuadro) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            @endcan
                            @can('admin.chart.destroy')
                                <td width="10px">
                                    <form action="{{ route('admin.chart.destroy',$cuadro)}}" method="post">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                                    </form>

                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('css')
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
        $('#chart').DataTable({
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
