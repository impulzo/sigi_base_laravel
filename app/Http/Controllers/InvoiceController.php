<?php

namespace App\Http\Controllers;

use App\Libraries\Invoices\InvoiceService;
use App\Libraries\Notifications\Mail;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Impulzo\RestClientService\Libraries\RestClient;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use TCG\Voyager\Models\Setting;

class InvoiceController extends VoyagerBaseController
{
    public function store(Request $request){
        $Items = array();
        $products = json_decode($request->products);
        foreach ($products as $product) {
            $item = array(
                "ProductCode" => $product->product_code,
                "IdentificationNumber" => $product->id,
                "Description" => $product->description,
                "Unit" => "NO APLICA",
                "UnitCode" => $product->unit_code,
                "UnitPrice" => $product->price,
                "Quantity" => $product->quantity,
                "Subtotal" => $product->subtotal,
                "TaxObject" => "02",
                "Taxes" => array(
                    array(
                        "Total" => $product->iva,
                        "Name" => "IVA",
                        "Base" => $product->subtotal,
                        "Rate" => 0.16,
                        "IsRetention" => false
                    )
                ),
                "Total" => $product->total
            );
            array_push($Items, $item);
        }
        $invoice = array(
            "invoice" => array(
                "Serie" => $request->Serie,
                "Currency" => $request->Currency,
                "ExpeditionPlace" => $request->ExpeditionPlace,
                "PaymentConditions" => $request->PaymentConditions,
                "Folio" => "000001",
                "CfdiType" => $request->CfdiType,
                "PaymentForm" => $request->PaymentForm,
                "PaymentMethod" => $request->PaymentMethod,
                "Exportation" => "01",
                "Receiver" => array(
                    "Rfc" => $request->Rfc,
                    "Name" => $request->Name,
                    "CfdiUse" => $request->CfdiUse,
                    "FiscalRegime" => $request->FiscalRegime,
                    "TaxZipCode" => $request->TaxZipCode
                ),
                "Items" => $Items
            )
        );
        $invoice_service = new InvoiceService(new RestClient);
        $response = $invoice_service->generate($invoice);
        if($response['status'] == 200 && isset($response['data']->id)){
            Invoice::create([
                'customer_id' => $request->customer_id,
                'invoice_id' => $response['data']->id,
                'link_pdf' => $response['data']->pdf->url,
                'link_xml' => $response['data']->xml->url,
                'products' => $request->products
            ]);
            $company = Setting::find(1);
            $data = [
                'name' => $request->Name,
                'company' => $company->value
            ];
            $mail = new Mail(new RestClient());
            $mail->send($request->Email, 'FACTURA GENERADA', view('mail.notification', $data)->render());
            return redirect()->route('voyager.invoices.index')->with([
                'message'    => "Factura generada con éxito. ",
                'alert-type' => 'success',
            ]);
        }
        return back()->with([
            'message'    => "Algo salió mal, vuela a intentar. ",
            'alert-type' => 'error',
        ]);
    }

    public function destroy(Request $request, $id)
    {
        $invoice_service = new InvoiceService(new RestClient);
        $invoice = Invoice::find($id);
        $response = $invoice_service->delete($invoice->invoice_id);
        parent::destroy($request, $id);
    }
}
