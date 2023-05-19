<?php

namespace App\Libraries\Notifications;

use App\Models\NotificationRecord;
use Impulzo\RestClientService\Libraries\Facade\RestClientFacade;

class Mail
{
    protected $service;

    public function __construct(RestClientFacade $service)
    {
        $this->service = $service;
    }

    public function send($to, $subject, $body)
    {
        $response = array('status' => 200);
        try {
            $headers = null;
            $url = env('MAIL_IMPULZO_IP');
            $client = env('IMPULZO_CLIENT');
            $fields = array(
                'to' => $to,
                'subject' => $subject,
                'body' => $body,
                'client' => $client
            );
            $response['data'] = $this->service->post($url, $fields, $headers);
        } catch (\Exception $ex) {
            $response['status'] = 500;
            $response['message'] = $ex->getMessage();
        }
        return $response;
    }
}
