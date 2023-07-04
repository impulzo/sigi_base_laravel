@extends('voyager::master')

@section('page_title', 'REPORTE DE FACTURAS')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-file-text"></i>
        REPORTE DE FACTURAS
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
                        <form action="{{route('reports.range.pdf')}}" method="POST" target="_blank">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="initial_date" class="control-label">FECHA INICIAL: </label>
                                        <input type="date" class="form-control" id="initial_date" name="initial_date"
                                            value="{{ now()->addDays(-1)->format('Y-m-d') }}" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="final_date" class="control-label">FECHA FINAL: </label>
                                        <input type="date" class="form-control" id="final_date" name="final_date"
                                            value="{{ now()->format('Y-m-d') }}" required />
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        Generar PDF <i class="voyager-file-text"></i>
                                    </button>
                                    <button type="button" id="getData" class="btn btn-primary">
                                        Obtener información <i class="voyager-file-text"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <h3 class="text-center">Facturas</h3>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>PDF</th>
                                        <th>XML</th>
                                        <th>Cliente</th>
                                        <th>Total</th>
                                        <th>Registro</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_inv">
                                    
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

@stop

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                destroy: false,
                pageLength: 10,
                order: [
                    [1, 'desc']
                ], //ordenar de forma descendente
                language: {
                    sProcessing: "Procesando...",
                    sLengthMenu: "Mostrar _MENU_ registros",
                    sZeroRecords: "No se encontraron resultados",
                    sEmptyTable: "Ningún dato disponible en esta tabla",
                    sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                    sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                    sInfoPostFix: "",
                    sSearch: "Buscar:",
                    sUrl: "",
                    sInfoThousands: ",",
                    sLoadingRecords: "Cargando...",
                    oPaginate: {
                        sFirst: "Primero",
                        sLast: "Último",
                        sNext: "Siguiente",
                        sPrevious: "Anterior",
                    },
                    oAria: {
                        sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                        sSortDescending: ": Activar para ordenar la columna de manera descendente",
                    },
                },
                lengthMenu: [
                    [5, 10, 15],
                    [5, 10, 15],
                ],
            });
        });
        $('#getData').click(function(){
            let initial_date = $('#initial_date').val();
            let final_date = $('#final_date').val();
            $.ajax({
                type: "POST",
                url: "{{route('reports.range')}}",
                dataType:"json",
                data: {initial_date, final_date },
                success : function (response)
                {
                    if (response.status == 200) {
                        let tds = "";
                        response.data.forEach(x => {
                            tds += "<tr><td><a href='"+x.link_pdf+"' target='blank'>PDF</a></td>";
                            tds += "<td><a href='"+x.link_xml+"' target='blank'>XML</a></td>";
                            tds += "<td>"+x.client.full_name+"</td>";
                            tds += "<td>$ "+x.total.toFixed(2)+"</td>";
                            tds += "<td>"+x.date+"</td></tr>";
                        });
                        $('#tbody_inv').html(tds);
                    }else{
                        $('#tbody_inv').html('');
                    }
                }
            });
        });
    </script>
@stop
