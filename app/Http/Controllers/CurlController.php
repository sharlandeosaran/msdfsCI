<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurlController extends Controller
{

    public function index()
    {
        // Make Post Fields Array
        $data1 = [
            'email' => 'your@email.com',
        ];
        
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "http://161.35.62.102:5000/auth",
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data1),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTPHEADER => [
                "content-type: application/json",
                "token: ".config('curl.token', ''),
            ],
        ]);
        
        $response = curl_exec($curl);
        $get = json_decode($response);
        curl_close($curl);
        
        dd($get->token);
    }
}
