<?php

namespace NSpehler\LaravelInsee;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Insee
{
    public function access_token()
    {
        // Base64 encode consumer key and secret
        $token = base64_encode(config('insee.consumer_key') .':'. config('insee.consumer_secret'));

        // Request access token from Insee
        $client = new Client();
        $result = $client->post('https://api.insee.fr/token', [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Authorization' => 'Basic '. $token
            ],
            'form_params' => [
                'grant_type' => 'client_credentials'
            ]
        ]);

        $result = json_decode($result->getBody());

        return $result->access_token;
    }

    public function siren($siren)
    {
        // Verify SIREN number with Insee
        $client = new Client();
        $result = $client->get('https://api.insee.fr/entreprises/sirene/V3/siren/'. $siren, [
            'headers' => [
                'Authorization' => 'Bearer '. $this->access_token()
            ]
        ]);

        return json_decode($result->getBody(), true);
    }
}
