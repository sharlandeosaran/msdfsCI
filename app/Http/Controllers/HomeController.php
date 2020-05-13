<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function thanks()
    {
        $data = [
            'title' => 'Thank You.',
        ];
        
        return view('thanks.home', $data);
    }
}
