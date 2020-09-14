<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Validator;
use App\User as User;

class AdminController extends Controller
{

    public function resetpassword($id)
    {
        if(!\Auth::user()->admin) return back()->with('flashed', 'Unauthorised to access that page!!');

        $user = User::find($id);
        $user->password = 'password';
        $user->save();
        
        $log = new \App\UserAudit;
        $log->user_id = $user->id;
        $log->attribute = 'password';
        $log->old = '-';
        $log->new = 'password reset';
        $log->changed_by = \Auth::user()->id;
        $log->save();

        // send email to user with credentials
        \Mail::send(new \App\Mail\Users\ResetPassword($user));

        return redirect('/admin/users/view/'.$id)->with('reset', 'success');
    }

    public function versionlog()
    {
        $data = [
            'title' => 'Version Log',
			'active' => 'logs',
            'activelink' => 'versionlog',
        ];

        return view('admin.logs.version.log', $data);
    }

    public function errorlogs()
    {
        $data = [
            'title' => 'Error Log',
			'active' => 'logs',
            'activelink' => 'errorlogs',
            'logs' => \App\ErrorLog::all(),
        ];

        return view('admin.logs.error.table', $data);
    }
}
