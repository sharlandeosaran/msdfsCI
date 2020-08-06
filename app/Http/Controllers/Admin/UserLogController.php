<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserLogController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'User Logs',
			'active' => 'logs',
            'activelink' => 'userlogs',
            'logs' => \App\UserLog::all(),
        ];

        return view('admin.logs.userlog.table', $data);
    }
}
