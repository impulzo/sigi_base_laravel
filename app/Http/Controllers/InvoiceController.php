<?php

namespace App\Http\Controllers;

use App\Models\Fiscal;
use App\Models\User;
use Illuminate\Http\Request;
use Impulzo\RestClientService\Libraries\Facade\RestClientFacade;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class InvoiceController extends VoyagerBaseController
{
    //catalogs
    public function getRegimens(RestClientFacade $service)
    {
        $response = array('status' => 200);
        try {
            $headers = null;
            $url = env('INVOICE_IMPULZO_IP') . '/api/v1/catalogs/fiscal_regimens';
            $response['data'] = $service->get($url, $headers);
        } catch (\Exception $ex) {
            $response['status'] = 500;
            $response['message'] = $ex->getMessage();
        }
        return $response;
    }

    public function getCurrencies(RestClientFacade $service)
    {
        $response = array('status' => 200);
        try {
            $headers = null;
            $url = env('INVOICE_IMPULZO_IP') . '/api/v1/catalogs/currencies';
            $response['data'] = $service->get($url, $headers);
        } catch (\Exception $ex) {
            $response['status'] = 500;
            $response['message'] = $ex->getMessage();
        }
        return $response;
    }

    public function getCfdiTypes(RestClientFacade $service)
    {
        $response = array('status' => 200);
        try {
            $headers = null;
            $url = env('INVOICE_IMPULZO_IP') . '/api/v1/catalogs/cfdi_types';
            $response['data'] = $service->get($url, $headers);
        } catch (\Exception $ex) {
            $response['status'] = 500;
            $response['message'] = $ex->getMessage();
        }
        return $response;
    }

    public function getPaymentsForm(RestClientFacade $service)
    {
        $response = array('status' => 200);
        try {
            $headers = null;
            $url = env('INVOICE_IMPULZO_IP') . '/api/v1/catalogs/payment_forms';
            $response['data'] = $service->get($url, $headers);
        } catch (\Exception $ex) {
            $response['status'] = 500;
            $response['message'] = $ex->getMessage();
        }
        return $response;
    }

    public function getPaymentsMethod(RestClientFacade $service)
    {
        $response = array('status' => 200);
        try {
            $headers = null;
            $url = env('INVOICE_IMPULZO_IP') . '/api/v1/catalogs/payment_methods';
            $response['data'] = $service->get($url, $headers);
        } catch (\Exception $ex) {
            $response['status'] = 500;
            $response['message'] = $ex->getMessage();
        }
        return $response;
    }

    public function getCfdisUse(RestClientFacade $service)
    {
        $response = array('status' => 200);
        try {
            //defined keyword 
            $keyword = 'HERD9305118V8';
            $headers = null;
            $url = env('INVOICE_IMPULZO_IP') . '/api/v1/catalogs/cfdi_uses?keyword=' . $keyword;
            $response['data'] = $service->get($url, $headers);
        } catch (\Exception $ex) {
            $response['status'] = 500;
            $response['message'] = $ex->getMessage();
        }
        return $response;
    }

    //methods
    public static function login()
    {
        $response = array('status' => 200);
        $service = new RestClientFacade();
        try {
            $headers = null;
            $body = array('user' => array('email' => env('INVOICE_IMPULZO_EMAIL'), 'password' => env('INVOICE_IMPULZO_PASSWORD')));
            $url = env('INVOICE_IMPULZO_IP') . '/api/v1/login';
            $data = $service->post($url, ($body), $headers);
            $response['data'] = $data->user;
        } catch (\Exception $ex) {
            $response['status'] = 500;
            $response['message'] = $ex->getMessage();
        }
        return $response;
    }

    public static function updateUser($rfc, $name, $fiscal_regime, $token)
    {
        $response = array('status' => 200);
        $service = new RestClientFacade();
        try {
            $headers = array('Authorization: Bearer '.$token,'Content-Type: application/json');
            $body = array('user' => array('rfc' => $rfc, 'name' => $name, 'fiscal_regime' => $fiscal_regime));
            $url = env('INVOICE_IMPULZO_IP').'/api/v1/user';
            $response['data'] = $service->put($url, json_encode($body), $headers);
        } catch (\Exception $ex) {
            $response['status'] = 500;
            $response['message'] = $ex->getMessage();
        }
        return $response;
    }

    public static function createCSD($certificate, $private_key, $private_key_password, $token)
    {
        $response = array('status' => 200);
        $service = new RestClientFacade();
        try {
            $headers = array('Authorization: Bearer '.$token,'Content-Type: application/json');
            $body = array('user' => array('certificate' => $certificate, 'private_key' => $private_key, 'private_key_password' => $private_key_password));
            $url = env('INVOICE_IMPULZO_IP').'/api/v1/user/create_csd';
            $response['data'] = $service->post($url, json_encode($body), $headers);
        } catch (\Exception $ex) {
            $response['status'] = 500;
            $response['message'] = $ex->getMessage();
        }
        return $response;
    }

    public static function createInvoice($invoice, $token)
    {
        $response = array('status' => 200);
        $service = new RestClientFacade();
        try {
            $headers = array('Authorization: Bearer '.$token,'Content-Type: application/json');
            $body = array('invoice' => $invoice);
            $url = env('INVOICE_IMPULZO_IP').'/api/v1/stamps';
            $response['data'] = $service->post($url, json_encode($body), $headers);
        } catch (\Exception $ex) {
            $response['status'] = 500;
            $response['message'] = $ex->getMessage();
        }
        return $response;
    }

    public static function deleteInvoice($id, $token)
    {
        $response = array('status' => 200);
        $service = new RestClientFacade();
        try {
            $headers = array('Authorization: Bearer '.$token,'Content-Type: application/json');
            $url = env('INVOICE_IMPULZO_IP').'/api/v1/stamps/'.$id;
            $response['data'] = $service->delete($url,null, $headers);
        } catch (\Exception $ex) {
            $response['status'] = 500;
            $response['message'] = $ex->getMessage();
        }
        return $response;
    }
    
    //methods HTTP
    public function update(Request $request, $id){
        $fiscal = Fiscal::find($id);
        $token = InvoiceController::login();
        $token = $token['data']->token;
        $msg = "Actualizado con éxito en los registros del sistema. ";
        if(isset($request->certificate_file) && isset($request->private_key_file) && (isset($request->private_key_password) || isset($fiscal->private_key_password))){
            $certificate = base64_encode(file_get_contents($request->file('certificate_file')));
            $private_key = base64_encode(file_get_contents($request->file('private_key_file')));
            $responseCSD = $this->createCSD($certificate, $private_key, $request->private_key_password, $token);
            $responseCSD = $responseCSD['status'];
            $fiscal->certificate = $certificate;
            $fiscal->private_key = $private_key;
            $msg = $msg.$responseCSD == 200 ? 'CSD creado con éxito': 'CSD ya registrado. ';
        }
        if(isset($request->rfc) && isset($request->name) && isset($request->fiscal_regime)){
            $responseUser = $this->updateUser($request->rfc, $request->name, $request->fiscal_regime, $token);
            $responseUser = $responseUser['status'];
            $fiscal->rfc = $request->rfc;
            $fiscal->name = $request->name;
            $fiscal->fiscal_regime = $request->fiscal_regime;
            $msg = $msg.($responseUser == 200 ? 'Usuario actualizado con éxito': 'Ocurrió un error');
        }
        
        $fiscal->private_key_password = $request->private_key_password ? $request->private_key_password : $fiscal->private_key_password;
        $fiscal->update();
        $data = [
            'message'    => $msg,
            'alert-type' => 'success'
        ];
        return redirect('/admin/fiscals')->with($data);
    }
}
