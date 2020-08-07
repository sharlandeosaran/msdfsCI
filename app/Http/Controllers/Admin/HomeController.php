<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        
        $feedback_count = 0;//\App\DashboardData::valueBySlug('feedback_count');
        $comments = 0;//\App\DashboardData::valueBySlug('comments');
        $unique_persons = 0;//\App\DashboardData::valueBySlug('unique_persons');
        $organizations = 0;//\App\DashboardData::valueBySlug('organizations');
        $categories = 0;//\App\DashboardData::valueBySlug('category_bar_chart');

        // sort categories in descending for graph
        $cats = $categories? json_decode($categories) : [];
        usort($cats, 'dashboard_sort_categories');

        // dispatch(new \App\Jobs\UpdateDashboardData());

        $data = [
            'title' => 'Dashboard',
            'active' => 'home',

            // general users
            'feedback_count' => $feedback_count? number_short($feedback_count) : '0',
            'comments' => $comments? number_short($comments) : '0',
            'unique_persons' => $unique_persons? number_short($unique_persons) : '0',
            'organizations' => $organizations? number_short($organizations) : '0',
            'categories' => $cats,
            'cats' => [],//\App\Category::pluck('id')->toArray(),

            // admin users
            'users' => \App\User::all()->count(),
            'inactiveusers' => \App\User::all()->where('active', 0)->count(),
            'emaillogs' => \App\EmailLog::all()->count(),
            'userlogs' => \App\UserLog::all()->count(),
            'errors' => \App\ErrorLog::adminDashboard(),

        ];

        return view('admin.dashboard', $data);
    }
}
