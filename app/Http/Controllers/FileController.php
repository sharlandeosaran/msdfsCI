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
            if ($file['name'] != '' && $request->file($name)) {
                if (is_array($file['name'])) {
                    // dd($file['name']);

                    foreach ($file['name'] as $key => $value) {
                        // dd($_FILES[$name]);
                        // dd($request->file($name)[$key]);
                        if($value && $request->file($name)[$key]->isValid()) {
                            $file = tempnam(sys_get_temp_dir(), 'POST');
                            file_put_contents($file, $request->file($name[$key]));//$_FILES[$name][$key]);
                            
                            $list[$name.'_'.$key] = curl_file_create($file, $_FILES[$name]['type'][$key], $_FILES[$name]['name'][$key] );
                            
                            $chk = true;
                        }
                    }
                } else if($request->file($name)->isValid()) {
                    $file = tempnam(sys_get_temp_dir(), 'POST');
                    file_put_contents($file, $_FILES[$name]);
                    
                    $list[$name] = curl_file_create($file, $_FILES[$name]['type'], $_FILES[$name]['name'] );
                    
                    $chk = true;
                }
                

            }
        }
        // dd($list);

        return [
            'response' => $chk,
            'list' => json_encode($list),
        ];
    }
}
