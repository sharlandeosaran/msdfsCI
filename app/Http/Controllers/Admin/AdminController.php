<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Validator;
use App\AccountManager as AccountManager;
use App\MinistryAgency as MinistryAgency;
use App\Requester as Requester;
use App\Category as Category;
use App\Service as Service;
use App\User as User;
use App\CurrentInstitution as CurrentInstitution;
use App\InstitutionHasManager as InstitutionHasManager;

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
        dispatch(new \App\Jobs\ResetPassword($id));

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
