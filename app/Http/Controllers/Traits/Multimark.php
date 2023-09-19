<?php

namespace App\Http\Controllers\Traits;

use GuzzleHttp\Client;

trait Multimark {

    public function connection($method,$host,$complement_host,$params)
    {
        try {

            $client = new Client();
            $request =  $client->request($method,$host.$complement_host,$params);
            if($request->getStatusCode() == 200) {
                return json_decode($request->getBody()->getContents());
            }
            return false;

        } catch (\Exception $exception) {

            return false;
        }

    }

    public function login($credentials)
    {
        $encdec = new \App\Http\Controllers\Security\EncdecController;

        $params =  [
            "username" => $credentials->user_name,
            "password" => $encdec->encrypt_decrypt('decrypt', $credentials->password),
            "secretKey" => $credentials->key,
            "validateIp" => false,
        ];

        $response = $this->connection('POST',$credentials->url_service,'/auth/login',['form_params' => $params]);
        if($response)
            return $response->user->token;

        return false;

    }
}
