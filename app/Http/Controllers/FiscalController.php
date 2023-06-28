<?php

namespace App\Http\Controllers;

use App\Libraries\Invoices\InvoiceService;
use App\Models\Fiscal;
use Illuminate\Http\Request;
use Impulzo\RestClientService\Libraries\RestClient;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class FiscalController extends VoyagerBaseController
{
    public function update(Request $request, $id)
    {
        $fiscal = Fiscal::find($id);
        $invoice_service = new InvoiceService(new RestClient());
        $msg = "Actualizado con éxito en los registros del sistema. ";
        if (isset($request->certificate_file) && isset($request->private_key_file) && (isset($request->private_key_password) || isset($fiscal->private_key_password))) {
            $certificate = base64_encode(file_get_contents($request->file('certificate_file')));
            $private_key = base64_encode(file_get_contents($request->file('private_key_file')));
            $responseCSD = $invoice_service->createCSD($certificate, $private_key, $request->private_key_password);
            $responseCSD = $responseCSD['status'];
            $fiscal->certificate = $certificate;
            $fiscal->private_key = $private_key;
            $msg = $msg . $responseCSD == 200 ? 'CSD creado con éxito' : 'CSD ya registrado. ';
        }
        if (isset($request->rfc) && isset($request->name) && isset($request->fiscal_regime)) {
            $responseUser = $invoice_service->updateUser($request->rfc, $request->name, $request->fiscal_regime);
            $responseUser = $responseUser['status'];
            $fiscal->rfc = $request->rfc;
            $fiscal->name = $request->name;
            $fiscal->fiscal_regime = $request->fiscal_regime;
            $msg = $msg . ($responseUser == 200 ? 'Usuario actualizado con éxito' : 'Ocurrió un error');
        }

        $fiscal->private_key_password = $request->private_key_password ? $request->private_key_password : $fiscal->private_key_password;
        $fiscal->update();
        $data = [
            'message'    => $msg,
            'alert-type' => 'success'
        ];
        return redirect()->route('voyager.fiscals.index')->with($data);
    }
}
