<?php

namespace MyApp\Classes;
use GuzzleHttp\Client;


class HttpClient {

    public function getStatus($src){

        $client = new Client();
        $one = microtime(1);

        $response = $client->request('GET', $src);

        $resp['status'] =  $response->getStatusCode();
        $two = microtime(1);
        $resp['time'] = $two - $one;
        
        return $resp;
    }
}