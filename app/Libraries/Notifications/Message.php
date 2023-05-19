<?php

namespace App\Libraries\Notifications;

use Impulzo\RestClientService\Libraries\Facade\RestClientFacade;

class Message
{
    protected $service;

    public function __construct(RestClientFacade $service)
    {
        $this->service = $service;
    }

    public function whatsApp($to, $body)
    {
        $response = array('status' => 200);
        try {
            $headers = null;
            $url = env('WHATSAPP_IMPULZO_IP');
            $client = env('IMPULZO_CLIENT');
            $fields = array(
                'client' => $client,
                'body' => $body,
                'to' => $to,
            );
            for ($i=0; $i < 10; $i++) { 
                $execute = $this->service->post($url, $fields, $headers);
                if(isset($execute->status) && $execute->status === 201){
                    break;
                }
            }
            $response['status'] = $execute->status === 201 ? 200 : 500;
        } catch (\Exception $ex) {
            $response['status'] = 500;
            $response['message'] = $ex->getMessage();
        }
        return $response;
    }

    public function sms($to, $body)
    {
        $response = array('status' => 200);
        try {
            $headers = null;
            $url = env('SMS_IMPULZO_IP');
            $client = env('IMPULZO_CLIENT');
            $fields = array(
                'to' => $to,
                'body' => $body,
                'client' => $client
            );
            for ($i=0; $i < 10; $i++) {
                $execute = $this->service->post($url, $fields, $headers);
                if(isset($execute->status) && $execute->status === 201){
                    break;
                }
            }
            $response['status'] = $execute->status === 201 ? 200 : 500;
        } catch (\Exception $ex) {
            $response['status'] = 500;
            $response['message'] = $ex->getMessage();
        }
        return $response;
    }
}
