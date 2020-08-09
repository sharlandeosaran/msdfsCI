<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use PDF;

class ReportController extends Controller
{

    public function transactions($range)
    {
        $string = explode('.', $range);
        $results = $list = [];
        
        $receipts = \App\Acknowledgement::
            select('receipts.created_at as date', 'receipts.receipt_num', 'receipts.payment_num', 'receipts.auth_id', 'payment_types.type', 'acknowledgements.number as ack_num', 'acknowledgements.total as amt', 'receipts.created_by as created_by')->
            leftJoin('receipts', 'acknowledgements.id', '=', 'receipts.ack_id')->
            leftJoin('payment_types', 'payment_types.id', '=', 'receipts.type_id')->
            where(function ($query) use ($string){
                $query->where('receipts.created_at', '>=', $string[0].' '.$string[1].':00');
                $query->where('receipts.created_at', '<=', $string[2].' '.$string[3].':00');
            })->
            get();
        
        $voids = \App\Acknowledgement::
            select('voids.created_at as date', 'voids.id as void_num', 'voids.details as void_details', 'acknowledgements.number as ack_num', 'voids.created_by as created_by', DB::raw("CONCAT('-',acknowledgements.total) AS amt"))->
            leftJoin('voids', 'acknowledgements.id', '=', 'voids.ack_id')->
            where(function ($query) use ($string){
                $query->where('voids.created_at', '>=', $string[0].' '.$string[1].':00');
                $query->where('voids.created_at', '<=', $string[2].' '.$string[3].':00');
            })->
            get();

        $results = array_merge($receipts->toArray(), $voids->toArray());
        usort($results, sortDesc('date')); // sort by date

        $total = 0;
        foreach ($results as $row) {
			if (isset($row['type'])) {
				$list[$row['type']]['all'][] = $row;

				if (isset($list[$row['type']]['total'])) {
					$list[$row['type']]['total'] += $row['amt'];
				}else{
					$list[$row['type']]['total'] = $row['amt'];
				}
			}else{
				$list['Void']['all'][] = $row;
				
				if (isset($list['Void']['total'])) {
					$list['Void']['total'] += $row['amt'];
				}else{
					$list['Void']['total'] = $row['amt'];
				}
			}
			
			$total += $row['amt'];
        }

        $data = [
            'title' => 'Transaction Report',
            'range' => $string[0].' '.$string[1].' to '.$string[2].' '.$string[3],
            'string' => $string[0].'.'.$string[1].'.'.$string[2].'.'.$string[3],
            'label' => $string[0].'-'.$string[2],
            'list' => $list,
            'total' => number_format($total,2),
        ];

        // return view('reports.transaction', $data);
        $pdf = PDF::loadView('reports.transaction', $data);
        $pageOptions = [
            'margin-bottom'    => 10,
            'footer-left'      => \Carbon\Carbon::now()->format('l, jS F Y'),
            'footer-right'     => "page [page]",
            'footer-font-size' => 8,
            'footer-spacing'   => 5,
        ];

        return $pdf
                ->setOptions($pageOptions)
                ->setOrientation('landscape')
                // ->setPaper('Legal')
                ->inline('transaction_report_'.$range.'.pdf');
    }

    public function acknowledgements($range)
    {
        $string = explode('.', $range);

        $resultsGet = \App\Acknowledgement::
            where(function ($query) use ($string){
                $query->where('date', '>=', $string[0]);
                $query->where('date', '<=', $string[1]);
            })
            ->orderBy('date','desc')
            ->get();

		$statusArray = [];
		foreach ($resultsGet as $row) {
			$statusArray[$row->status][] = $row;
		}

		$status = '';
		switch ($string[2]) {
			case '1': // paid
				$results = $statusArray['Paid'];
				$status = 'Paid';
				break;
			
			case '0': // unpaid
				$results = $statusArray['Outstanding'];
				$status = 'Outstanding';
				break;
			
			case '2': // void
				$results = $statusArray['Voided'];
				$status = 'Voided';
				break;
			
			case '3': // refunded
				$results = $statusArray['Refunded'];
				$status = 'Refunded';
				break;
			
			default: // all
				$results = $resultsGet;
				$status = 'All';
				break;
		}

        $total = 0;
        foreach ($results as $row) {
            $total += $row->total;
        }

        $data = [
            'title' => 'Acknowledgement Report',
            'range' => $string[0].' to '.$string[1].' '.$status,
            'string' => $string[0].'.'.$string[1],
            'label' => $string[0].'-'.$string[1],
            'list' => $results,
            'total' => '$'.number_format($total,2),
        ];

        //return view('reports.acknowledgement', $data);
        $pdf = PDF::loadView('reports.acknowledgement', $data);
        $pageOptions = [
            'margin-bottom'    => 10,
            'footer-left'      => \Carbon\Carbon::now()->format('l, jS F Y'),
            'footer-right'     => "page [page]",
            'footer-font-size' => 8,
            'footer-spacing'   => 5,
        ];

        //return view('clients.individuals.reports.details', $data);
        return $pdf
                ->setOptions($pageOptions)
                ->setOrientation('landscape')
                // ->setPaper('Legal')
                ->inline('acknowledgement_report_'.$range.'.pdf');
    }
}
