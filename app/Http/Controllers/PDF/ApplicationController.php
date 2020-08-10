<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use PDF;

class ApplicationController extends Controller
{

    public function index($id)
    {
        $application = \App\Application::find($id);
        if(!$application) return back()->with('flashed', 'That application does not exist');

        $data = [
            'title' => 'Application Print',
            'application' => $application,
        ];

        // return view('pdf.application', $data);
        $pdf = PDF::loadView('admin.pdf.application', $data);
        $pageOptions = [
            'margin-top'       => 2,
            'margin-bottom'    => 10,
            'encoding'         => 'UTF-8',
            'footer-left'      => \Carbon\Carbon::now()->format('l, jS F Y'),
            'footer-right'     => "page | [page]",
            'footer-font-size' => 8,
            'footer-spacing'   => 5,
        ];

        return $pdf
                ->setOptions($pageOptions)
                ->setOrientation('portrait')
                // ->setPaper('Legal')
                ->inline('application_'. $id . '.pdf');
    }
}
