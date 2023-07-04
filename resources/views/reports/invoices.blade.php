<style>
    .container{
        color: #4b4b4b;
        margin-right: -10px;
    }
    h4{
        text-align: center; 
        font-size: 13pt; margin:5px;
    }
    .table{
        width: 100%;
        font-size: 8pt;
        border-collapse: collapse;
    }
    .table thead tr th, .table tbody tr td{
        padding: 4px 3px;
        text-align: center;
        border: 1px solid #6e6e6e;
        color: #4b4b4b;
    }
    
</style>
<div class="container">
    <table class="table">   
        <thead>
            <tr>
                <th style="width: 5%">#</th>
                <th style="width: 20%">Enlace PDF</th>
                <th style="width: 19%">Enlace XML</th>
                <th style="width: 16%">Cliente</th>
                <th style="width: 16%">Total</th>
                <th style="width: 15%">Registro</th>
            </tr>
        </thead>
        <tbody>
            @php
                $cont = 1;
            @endphp
            @foreach ($invoices as $invoice)
                <tr>
                    <td>{{$cont}}</td>
                    <td><a href="{{$invoice->link_pdf}}" target='_blank'>PDF</a></td>
                    <td><a href="{{$invoice->link_xml}}" target='_blank'>XML</a></td>
                    <td>{{$invoice->client->full_name}}</td>
                    <td>$ {{number_format($invoice->total, 2, '.', ',')}}</td>
                    <td>{{$invoice->date}}</td>
                </tr>
                @php
                    $cont++;
                @endphp
            @endforeach
        </tbody>
    </table>
</div>