<?php

return [

    'token' => env('CURL_TOKEN', ''),
    'url' => [
        'files' => env('CURL_URL_FILES', ''),
        'forma' => env('CURL_URL_FORM_A', ''),
        'formb' => env('CURL_URL_FORM_B', ''),
    ],

];
