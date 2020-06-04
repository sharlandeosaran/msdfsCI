<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        // dd(url('/'));
        // dump(sys_get_temp_dir());

        $chk = false;
        $list = [];
        foreach ($_FILES as $name => $file) {
            if ($file['name'] != '' && $request->file($name) && $request->file($name)->isValid()) {

                $file = tempnam(sys_get_temp_dir(), 'POST');
                file_put_contents($file, $_FILES[$name]);
                
                $list[$name] = curl_file_create($file, $_FILES[$name]['type'], $_FILES[$name]['name'] );

                $chk = true;
            }
        }
        // dump($list);

        return [
            'response' => $chk,
            'list' => json_encode($list),
        ];
    }
}
