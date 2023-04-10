@extends('voyager::master')

@section('page_title', 'Historial de movimientos')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-book"></i>
        Historial de movimientos
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Tipo de movimiento</th>
                                        <th>Cantidad</th>
                                        <th>Notas</th>
                                        <th>Sucursal de traspaso</th>
                                        <th>Fecha</th>
                                        <th>Responsable</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{$item->movement->name}}</td>
                                            <td>{{$item->quantity}}</td>
                                            <td>{{$item->notes}}</td>
                                            <td>{{$item->sucursal ? $item->sucursal->name: ''}}</td>
                                            <td>{{$item->created_at->format('d/m/Y h:i a')}}</td>
                                            <td>{{$item->user->name}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ voyager_asset('lib/css/responsive.dataTables.min.css') }}">
@stop

@section('javascript')
    <!-- DataTables -->
    <script src="{{ voyager_asset('lib/js/dataTables.responsive.min.js') }}"></script>
@stop


