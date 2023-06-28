<?php
namespace App\Libraries\Notifications;

use Impulzo\RestClientService\Libraries\RestClient;

class Mail
{
    protected $service;

    public function __construct(RestClient $service) {
        $this->service = $service;
    }

    public function send($to, $subject, $body){
        $response = array('status' => 200);
        try {
            $headers = null;
            $url = env('MAIL_IMPULZO_IP');
            $client = env('IMPULZO_CLIENT');
            $fields = array(
                'to' => [$to],
                'subject' => $subject,
                'body' => $body,
                'client' => $client
            );
            for ($i=0; $i < 3; $i++) { 
                $execute = $this->service->post($url, $fields, $headers);
                if (isset($execute->status) && $execute->status === 201) {
                    break;
                }
            }
            $response['data'] = $execute;
        } catch (\Exception $ex) {
            $response['status'] = 500;
            $response['message'] = $ex->getMessage();
        }
        return $response;
    }
}

