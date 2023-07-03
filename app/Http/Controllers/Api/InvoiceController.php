<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function list(){
        $invoices = Invoice::get();
        foreach ($invoices as $item) {
            $item->client;
            $item->date = $item->created_at->format('d/m/Y');
        }
        return response()->json([
            'data' => $invoices,
            'status' => 200
        ]);
    }
}
