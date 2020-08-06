<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Validator;
use DB;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Users',
			'active' => 'users',
            'activelink' => 'users',
            'users' => \app\User::all(),
        ];

        return view('admin.users.table', $data);
    }

    public function view($id)
    {
        $user = \App\User::find($id);
        if (!$user) return back()->with('flashed', 'That user does not exist');
        
        $data = [
            'title' => 'View User | '.$user->name,
			'active' => 'users',
            'activelink' => 'users',
            'data' => $user,
        ];

        return view('profile.profile', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'New User',
			'active' => 'users',
            'activelink' => 'newuser',
            'categories' => [],//\App\Category::all(),
        ];

        return view('admin.users.new', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // dd($request->upload1->getClientOriginalName());

        $validator = Validator::make($request->all(), 
        [
            "name" => "required|max:150",
            "email" => "required|email|max:300|unique:users,email",
            "categories" => "array",
            "admin" => "required|boolean",
            "active" => "required|boolean",
        ],
        [
            
        ]
        );
        
        if ($validator->fails()) {
            return redirect('/admin/users/new')
            ->withInput()
            ->withErrors($validator);
        }

        // new user
        $user = new \App\User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->admin = $request->admin;
        $user->active = $request->active;
        $user->created_by = \Auth::user()->id;
        $user->password = 'password';
        $user->save();

        if($request->categories)
            foreach ($request->categories as $key => $value) {
                $cat = new \App\UserCategory;
                $cat->user_id = $user->id;
                $cat->category_id = $key;
                $cat->save();
            }

        // send emails
        // dispatch(new \App\Jobs\SubmissionEmail($user->id));
        
        return redirect('/admin/users/view/'.$user->id)->with('success', 'User submitted successfully.');
    }

    public function profile()
    {
        $data = [
            'title' => 'Profile',
			'active' => 'profile',
            'activelink' => 'profile',
            'data' => \Auth::user(),
        ];

        return view('profile.profile', $data);
    }
	
	public function password(Request $request)
    {
        // dd($request->all());

		$id = \Auth::user()->id;
		$validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed|different:old_password',
        ]);
		
        if ($validator->fails()) {
            return redirect('/admin/profile')
                ->withInput()
                ->withErrors($validator);
        }elseif(!\Hash::check($request->old_password, \Auth::user()->password)){
            return redirect('/admin/profile')
                ->withInput()
                ->withErrors('Incorrect password entered');
        }elseif(strtolower($request->password) == 'password'){
            return redirect('/admin/profile')
                ->withInput()
                ->withErrors("Password cannot be 'password'");
        }
		
		$resource = \App\User::find($id);
        $resource->password = $request->password;
        $resource->save();
		
		return redirect('/admin/profile')->with('password', 'changed');
	}

    public function edit($id)
    {
        $user = \App\User::find($id);
        if (!$user) return back()->with('flashed', 'That user does not exist');
        
        $data = [
            'title' => 'Edit User | '.$user->name,
			'active' => 'users',
            'activelink' => 'users',
            'data' => $user,
            'categories' => \App\Category::all(),
        ];

        return view('admin.users.new', $data);
    }

    public function update(Request $request)
    {
        // dd($request->all());
        // dd($request->upload1->getClientOriginalName());

        $validator = Validator::make($request->all(), 
        [
            "id" => "required|exists:users,id",
            "name" => "required|max:150",
            "email" => "required|email|max:300|unique:users,email,".$request->id,
            "categories" => "array",
            "admin" => "required|boolean",
            "active" => "required|boolean",
        ],
        [
            
        ]
        );
        
        if ($validator->fails()) {
            return back()
            ->withInput()
            ->withErrors($validator);
        }

        // get user
        $user = \App\User::find($request->id);

        // log status audit
        if($request->name != $user->name){
	        $log = new \App\UserAudit;
	        $log->user_id = $request->id;
	        $log->attribute = 'name';
	        $log->old = $user->name;
	        $log->new = $request->name;
	        $log->changed_by = \Auth::user()->id;
	        $log->save();
    	}
        if($request->email != $user->email){
	        $log = new \App\UserAudit;
	        $log->user_id = $request->id;
	        $log->attribute = 'email';
	        $log->old = $user->email;
	        $log->new = $request->email;
	        $log->changed_by = \Auth::user()->id;
	        $log->save();
    	}
        if($request->admin != $user->admin){
	        $log = new \App\UserAudit;
	        $log->user_id = $request->id;
	        $log->attribute = 'admin';
	        $log->old = $user->admin;
	        $log->new = $request->admin;
	        $log->changed_by = \Auth::user()->id;
	        $log->save();
    	}
        if($request->active != $user->active){
	        $log = new \App\UserAudit;
	        $log->user_id = $request->id;
	        $log->attribute = 'active';
	        $log->old = $user->active;
	        $log->new = $request->active;
	        $log->changed_by = \Auth::user()->id;
	        $log->save();
        }

        // check if categories have been changed
        $list = [];
        if ($request->categories) {
            foreach ($request->categories as $key => $value) {
                $list[] = $key;
            }
        }
        if($list != $user->category_id()->toArray()){
	        $log = new \App\UserAudit;
	        $log->user_id = $request->id;
	        $log->attribute = 'categories';
	        $log->old = json_encode($user->category_id()->toArray());
	        $log->new = json_encode($list);
	        $log->changed_by = \Auth::user()->id;
            $log->save();
            
            // update categories
            DB::delete('delete from user_categories where user_id = ?', [$request->id]);
            foreach ($request->categories as $key => $value) {
                $cat = new \App\UserCategory;
                $cat->user_id = $user->id;
                $cat->category_id = $key;
                $cat->save();
            }
        }

        // update user
        $user->name = $request->name;
        $user->email = $request->email;
        $user->admin = $request->admin;
        $user->active = $request->active;
        $user->save();

        // send emails
        // dispatch(new \App\Jobs\SubmissionEmail($user->id));
        
        return redirect('/admin/users/view/'.$user->id)->with('success', 'User updated successfully.');
    }
}
