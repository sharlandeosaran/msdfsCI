<?php

use Illuminate\Support\Facades\Route;

/*** role based access **************************/
//
// separate roles with '.'
// 'middleware' => ["access:admin.role2.role3"]
// 'middleware' => ["deny:admin.role2.role3"]
//
/************************************************/

// Auth::routes();

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/thanks', 'HomeController@thanks')->name('thanks');

// critical incident form
Route::get('/form/critical', 'CriticalIncidentController@index')->name('formcritical');
Route::post('/form/critical', 'CriticalIncidentController@store')->name('formcriticalpost');

// form A
Route::get('/form/a', 'FormAController@index')->name('forma');
Route::post('/form/a', 'FormAController@store')->name('formapost');

// form B
Route::get('/form/b', 'FormBController@index')->name('formb');
Route::post('/form/b', 'FormBController@store')->name('formbpost');

Route::get('/admin', 'Admin\HomeController@index');

Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
    
    // admin home
    // Route::get('/home', 'Admin\HomeController@index');
    // Route::get('/', 'Admin\HomeController@index');
    
    Route::group(['middleware' => ['auth', 'active']], function () {

        // application filter
        Route::get('/applications/filter', 'Admin\ApplicationController@application')->name('applicationfilter');
        Route::post('/applications/ajaxfilter', 'Admin\ApplicationController@applicationfilter')->name('applicationfilterajax');
        Route::get('/applications/view/{id}', 'Admin\ApplicationController@view');
        Route::post('/applications/status', 'Admin\ApplicationController@updatestatus')->name('updatestatus');
        Route::post('/applications/ajaxupdatedrow', 'Admin\ApplicationController@updatedrow')->name('updatedrowajax');

        // pdf
        Route::get('/applications/pdf/{id}', 'PDF\ApplicationController@index');
        Route::get('/schedules/pdf/{id}', 'PDF\ScheduleController@index');

        // approval
        Route::post('/approval/approvalrequest', 'Admin\ApprovalController@approvalrequest')->name('approvalrequest');
        Route::post('/approval/approvalpost', 'Admin\ApprovalController@approvalpost')->name('approvalpost');

        // schedules
        Route::get('/schedules', 'Admin\ScheduleController@index')->name('schedules');
        Route::get('/schedule/new', 'Admin\ScheduleController@new')->name('newschedule');
        Route::get('/schedule/view/{id}', 'Admin\ScheduleController@view');
        Route::post('/schedule/newschedulepost', 'Admin\ScheduleController@newschedulepost')->name('newschedulepost');
        
        // profile
        Route::get('/profile', 'Admin\UserController@profile')->name('profile');
        Route::put('/profile/password', 'Admin\UserController@password');

        Route::group(['middleware' => ['password']], function () {
            Route::get('/', 'Admin\HomeController@index')->name('adminhome');
            
            // non admin routes
            Route::group(['middleware' => ["access:admin"]], function () {
                // assignments
                Route::get('/submissions/assignments/submissions', 'Admin\AssignmentController@submissions')->name('assignmentssubmissions');
                Route::get('/submissions/assignments/comments', 'Admin\AssignmentController@comments')->name('assignmentscomments');

                // feedback/ submissions
                Route::get('/submissions/view/{id}', 'Admin\FeedbackController@view');
                Route::get('/submissions/pdf/{id}', 'PDF\FeedbackController@index');
                Route::get('/submissions/trash', 'Admin\TrashController@index')->name('trashfeedback');
                
                // Submission reports
                Route::get('/reports', 'Admin\ReportController@index')->name('reports');
                Route::get('/reports/category', 'Admin\ReportCategoryController@index')->name('reportbycategory');
                Route::post('/reports/reportbycategorypost', 'Admin\ReportCategoryController@report')->name('reportbycategorypost');
                Route::get('/reports/status', 'Admin\ReportstatusController@index')->name('reportbystatus');
                Route::post('/reports/reportbystatuspost', 'Admin\ReportstatusController@report')->name('reportbystatuspost');
                Route::get('/reports/date', 'Admin\ReportDateController@index')->name('reportbydate');
                Route::post('/reports/reportbydatepost', 'Admin\ReportDateController@report')->name('reportbydatepost');
                
                // Comment reports
                Route::get('/comments/view/{id}', 'Admin\CommentController@view');
                Route::put('/comments/status', 'Admin\CommentController@updatestatus')->name('updatecommentstatus');
                Route::get('/comments', 'Admin\CommentController@index')->name('comments');
                Route::post('/comments/comment/tag', 'Admin\CommentController@tags')->name('commenttagpost');
                Route::get('/comments/category', 'Admin\CommentCategoryController@index')->name('commentsbycategory');
                Route::post('/comments/commentbycategorypost', 'Admin\CommentCategoryController@comment')->name('commentbycategorypost');
                Route::get('/comments/subcategory', 'Admin\CommentSubCategoryController@index')->name('commentbysubcategory');
                Route::post('/comments/commentbysubcategorypost', 'Admin\CommentSubCategoryController@comment')->name('commentbysubcategorypost');
                Route::get('/comments/status', 'Admin\CommentstatusController@index')->name('commentbystatus');
                Route::post('/comments/commentbystatuspost', 'Admin\CommentstatusController@report')->name('commentbystatuspost');

                // search
                Route::post('/search', 'Admin\SearchController@search')->name('search');
                
                // pdfs
                // Route::get('/acknowledgements/reportpostpdf/{range}', 'PDF\ReportController@acknowledgements');
                
            });

            // admin routes
            Route::group(['middleware' => ["access:admin"]], function () {
                // logs
                Route::get('/logs', 'Admin\LogController@index')->name('logs');
                Route::get('/logs/emaillogs', 'Admin\EmailLogController@index')->name('emaillogs');
                Route::get('/logs/userlogs', 'Admin\UserLogController@index')->name('userlogs');
                Route::get('/logs/versionlog', 'Admin\AdminController@versionlog')->name('versionlog');
                Route::get('/logs/errorlogs', 'Admin\AdminController@errorlogs')->name('errorlogs');
                
                // users
                Route::get('/users', 'Admin\UserController@index')->name('users');
                Route::get('/users/view/{id}', 'Admin\UserController@view');
                Route::get('/users/new', 'Admin\UserController@new')->name('newuser');
                Route::post('/users/new', 'Admin\UserController@store')->name('userspost');
                Route::get('/users/edit/{id}', 'Admin\UserController@edit');
                Route::put('/users/edit', 'Admin\UserController@update')->name('userupdate');
                
                // reset user password
                Route::get('/users/resetpassword/{id}', 'Admin\AdminController@resetpassword');

            });
        });
        
    });
});