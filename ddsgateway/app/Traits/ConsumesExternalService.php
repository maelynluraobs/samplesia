<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumesExternalService
{
    /**
     * Send a request to any service
     * @param string $method
     * @param string $requestUrl
     * @param array $form_params
     * @param array $headers
     * @return string
     */
    public function performRequest($method, $requestUrl, $form_params = [], $headers = [])
    {
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);

        $response = $client->request($method, $requestUrl, [
            'form_params' => $form_params,
            'headers' => $headers,
        ]);

        return $response->getBody()->getContents();
    }
}
