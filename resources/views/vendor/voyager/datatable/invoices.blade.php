<div class="row">
    <div class="col-md-12">
        <div class="panel panel-bordered">
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Enlace PDF</th>
                                <th>Enlace XML</th>
                                <th>Registrado</th>
                                <th>Cliente</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_invoices">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@section('javascript')
    <!-- DataTables -->
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
            $.ajax({
                type: "GET",
                url: "{{url('/')}}/api/v1/invoices",
                dataType: "json",
                success: function(response) {
                    if (response.data) {
                        let tds = "";
                        response.data.forEach(x => {
                            tds += "<tr><td><a href='"+x.link_pdf+"'>PDF</a></td>";
                            tds += "<td><a href='"+x.link_xml+"'>XML</a></td>";
                            tds += "<td>"+x.created_at+"</td>";
                            tds += "<td>"+x.client.full_name+"</td></tr>";
                        });
                        $('#tbody_invoices').html(tds);
                    }
                    
                }
            });
        });
    </script>
@stop
