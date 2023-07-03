<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
}
