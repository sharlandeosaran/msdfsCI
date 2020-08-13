<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use PDF;

class ScheduleController extends Controller
{

    public function index($id)
    {
        $schedule = \App\Schedule::find($id);
        if(!$schedule) return back()->with('flashed', 'That schedule does not exist');

        $data = [
            'title' => 'Schedule Print',
            'schedule' => $schedule,
        ];

        // return view('pdf.schedule', $data);
        $pdf = PDF::loadView('pdf.schedule', $data);
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
                ->setPaper('Letter')
                ->inline('schedule_'. $id . '.pdf');
    }
}
