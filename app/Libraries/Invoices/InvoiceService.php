<?php
namespace App\Libraries\Invoices;

use Impulzo\RestClientService\Libraries\RestClient;

class InvoiceService
{
    protected $service;

    public function __construct(RestClient $service) {
        $this->service = $service;
    }

    public function login(){
        $response = array('status' => 200);
        try {
            $body = array('user' => array('email' => env('INVOICE_IMPULZO_EMAIL'), 'password' => env('INVOICE_IMPULZO_PASSWORD')));
            $url = env('INVOICE_IMPULZO_IP') . '/api/v1/login';
            $data = $this->service->post($url, $body);
            $response['data'] = $data->user;
        } catch (\Exception $ex) {
            $response['status'] = 500;
            $response['message'] = $ex->getMessage();
        }
        return $response;
    }

    public function generate($invoice){
        $response = array('status' => 200);
        try {
            $token = $this->login()['data']->token;
            $headers = array('Authorization: Bearer ' . $token, 'Content-Type: application/json');
            $url = env('INVOICE_IMPULZO_IP') . '/api/v1/stamps';
            $execute = $this->service->post($url, json_encode($invoice), $headers);
            $response['data'] = $execute;
        } catch (\Exception $ex) {
            $response['status'] = 500;
            $response['message'] = $ex->getMessage();
        }
        return $response;
    }

    public function delete($id)
    {
        $response = array('status' => 200);
        try {
            $token = $this->login()['data']->token;
            $headers = array('Authorization: Bearer ' . $token, 'Content-Type: application/json');
            $url = env('INVOICE_IMPULZO_IP') . '/api/v1/stamps/' . $id;
            $execute = $this->service->delete($url, null, $headers);
            $response['data'] = $execute;
        } catch (\Exception $ex) {
            $response['status'] = 500;
            $response['message'] = $ex->getMessage();
        }
        return $response;
    }

    public function updateUser($rfc, $name, $fiscal_regime)
    {
        $response = array('status' => 200);
        try {
            $token = $this->login()['data']->token;
            $headers = array('Authorization: Bearer ' . $token, 'Content-Type: application/json');
            $body = array('user' => array('rfc' => $rfc, 'name' => $name, 'fiscal_regime' => $fiscal_regime));
            $url = env('INVOICE_IMPULZO_IP') . '/api/v1/user';
            $response['data'] = $this->service->put($url, json_encode($body), $headers);
        } catch (\Exception $ex) {
            $response['status'] = 500;
            $response['message'] = $ex->getMessage();
        }
        return $response;
    }

    public function createCSD($certificate, $private_key, $private_key_password)
    {
        $response = array('status' => 200);
        try {
            $token = $this->login()['data']->token;
            $headers = array('Authorization: Bearer ' . $token, 'Content-Type: application/json');
            $body = array('user' => array('certificate' => $certificate, 'private_key' => $private_key, 'private_key_password' => $private_key_password));
            $url = env('INVOICE_IMPULZO_IP') . '/api/v1/user/create_csd';
            $response['data'] = $this->service->post($url, json_encode($body), $headers);
        } catch (\Exception $ex) {
            $response['status'] = 500;
            $response['message'] = $ex->getMessage();
        }
        return $response;
    }
}

