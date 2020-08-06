<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailLogController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Email Logs',
			'active' => 'logs',
            'activelink' => 'emaillogs',
            'logs' => \App\EmailLog::all(),
        ];

        return view('admin.logs.emaillog.table', $data);
    }
}
