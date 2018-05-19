<?php
/**
 * Created by Calenduck TEAM.
 * User: karin
 * Created at: 2018 - 05 - 15
 * Time: 00 : 55 : 44
 */

namespace App\Handlers;

use GuzzleHttp\Client;


class ApiRequestHandler
{
    public function get($baseUrl, $query)
    {
        $client = new Client(['base_uri' => $baseUrl]);
        $response = $client->get($query);
        $statusCode= $response->getStatusCode();
        //var_dump($statusCode);
        if($statusCode !== 200)
        {
            return false;
        }

        $header= $response->getHeader('content-type');
//        var_dump($header);

        $data = (string)$response->getBody();

        if(json_decode($data) && array_key_exists('err_no',json_decode($data))) {
            return false;
        }


        return $data;
    }
}