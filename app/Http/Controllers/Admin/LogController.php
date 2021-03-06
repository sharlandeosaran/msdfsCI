<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Logs',
			'active' => 'logs',
            'activelink' => 'logs',
        ];

        return view('admin.logs.logs', $data);
    }
}
