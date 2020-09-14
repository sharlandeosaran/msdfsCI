<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Validator;
use App\User as User;

class VersionLogController extends Controller
{

    public function index()
    {
        $data = [
            'title' => 'Version Log',
			'active' => 'logs',
            'activelink' => 'versionlog',
            'logs' => \App\VersionLog::ordered(),
        ];

        return view('admin.logs.version.log', $data);
    }

    public function postlog(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), 
        [
            "version" => "required|in:1,2,3",
            "log" => "required",
        ],
        [
            
        ]
        );
        
        if ($validator->fails()) {
            return back()
            ->withInput()
            ->withErrors($validator);
        }

        // get last update
        $last = \App\VersionLog::orderBy('id', 'desc')->first();
        $release = $feature = $update  = 0;
        if ($last) {
            switch ($request->version) {
                case '1':
                    $release = $last->release + 1;
                    $feature = $last->feature;
                    $update = $last->update;
                    break;

                case '2':
                    $release = $last->release;
                    $feature = $last->feature + 1;
                    $update = $last->update;
                    break;

                case '3':
                    $release = $last->release;
                    $feature = $last->feature;
                    $update = $last->update + 1;
                    break;
                
                default:
                    
                    break;
            }
        } else {
            switch ($request->version) {
                case '1':
                    $release = 1;
                    break;

                case '2':
                    $feature = 1;
                    break;

                case '3':
                    $update = 1;
                    break;
                
                default:
                    
                    break;
            }
            
        }
        
        $log = new \App\VersionLog();
        $log->user_id = $request->id;
        $log->release = $release;
        $log->feature = $feature;
        $log->update = $update;
        $log->log = $request->log;
        $log->user_id = \Auth::user()->id;
        $log->save();
        
        return redirect('/admin/logs/versionlog')->with('success', 'Version log updated successfully.');
    }
}
