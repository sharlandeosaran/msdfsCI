<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function store(Request $request)
    {

        $chk = false;
        $list = [];
        foreach ($_FILES as $name => $file) {
            if ($file['name'] != '' && $request->file($name)) {
                if (is_array($file['name'])) {

                    foreach ($file['name'] as $key => $value) {

                        if($value && $request->file($name)[$key]->isValid()) {
                            
                            // upload file
                            $path = $request->file($name)[$key]->storeAs('uploads/temps', msTimeStamp().'_'.$_FILES[$name]['name'][$key]);
                            
                            $list[$name.'_'.$key] = (object) [
                                'name' => $path, 
                                'mime' => $_FILES[$name]['type'][$key], 
                                'postname' => $_FILES[$name]['name'][$key] 
                            ];
                            
                            $chk = true;
                        }
                    }
                } else if($request->file($name)->isValid()) {
                            
                    // upload file
                    $path = $request->file($name)->storeAs('uploads/temps', msTimeStamp().'_'.$_FILES[$name]['name']);
                    $list[$name] = (object) [
                        'name' => $path, 
                        'mime' => $_FILES[$name]['type'], 
                        'postname' => $_FILES[$name]['name'] 
                    ];
                    
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
