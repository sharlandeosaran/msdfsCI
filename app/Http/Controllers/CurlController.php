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

        // $data_files = [
        //     'form' => 'form_a',
        //     'national_id_front' => new \CURLFILE($_FILES['id_card_front']['tmp_name'], $_FILES['id_card_front']['type'], $_FILES['id_card_front']['name']),
        //     'national_id_back' => new \CURLFILE($_FILES['id_card_back']['tmp_name'], $_FILES['id_card_back']['type'], $_FILES['id_card_back']['name'] ),
        // ];

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, config('curl.url.files', ''));
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $data_files);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, 
        // [
        //     "content-type: multipart/form-data",
        //     // "content-type: multipart/form-data; boundary=---011000010111000001101001",
        //     "token: ".config('curl.token', ''),
        // ]);

        // $response = curl_exec($ch);
        // dd($response);
    }
}
