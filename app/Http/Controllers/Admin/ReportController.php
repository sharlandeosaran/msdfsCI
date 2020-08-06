<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Submission Reports',
			'active' => 'reports',
			'activelink' => 'reports',
        ];

        return view('admin.reports.reports', $data);
    }
}
