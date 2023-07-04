<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Mpdf\InvoiceReport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mpdf\Output\Destination;
use TCG\Voyager\Models\Setting;

class ReportController extends Controller
{
    public function invoices(){
        return view('vendor.voyager.reports.invoices');
    }
    
    public function getInvoices(Request $request){
        $response = array('status' => 200);
        try {
            $initial_date = Carbon::createFromFormat('Y-m-d', $request->initial_date)->startOfDay();
            $final_date = Carbon::createFromFormat('Y-m-d', $request->final_date)->endOfDay();
            $invoices = Invoice::whereBetween('created_at', [$initial_date, $final_date])->get();
            foreach ($invoices as $item) {
                $item->client;
                $item->date = $item->created_at->format('d/m/Y');
            }
            $response['data'] = $invoices;
        } catch (\Exception $ex) {
            $response['status'] = 500;
            $response['message'] = 'Ocurrió el siguiente error: '.$ex->getMessage();
        }
        return $response;
    }

    public function invoicesPdf(Request $request){
        $initial_date = Carbon::createFromFormat('Y-m-d', $request->initial_date)->startOfDay();
        $final_date = Carbon::createFromFormat('Y-m-d', $request->final_date)->endOfDay();
        $invoices = Invoice::whereBetween('created_at', [$initial_date, $final_date])->get();
        foreach ($invoices as $item) {
            $item->client;
            $item->date = $item->created_at->format('d/m/Y');
        }

        $mpdf = new InvoiceReport();
        $mpdf->charset_in = 'utf-8';
        $title = Setting::find(1)->value;
        $mpdf->title = $title;
        $mpdf->reportTitle = 'REPORTE DE FACTURAS';
        $mpdf->dates = $initial_date->format('d/m/Y') . ' al ' . $final_date->format('d/m/Y');
        $data = [
            'invoices' => $invoices
        ];
        $view = view('reports.invoices', $data);
        $mpdf->WriteHTML($view);
        $mpdf->Output('Reporte de facturas.pdf', Destination::INLINE);
    }
}
