<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\Medicine;
use App\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// public routes
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');

Route::get('contact', function () { return view('contact'); })->name('contact');

Route::get('hours', function () {
    $admin = Admin::where('job_title', '=', 'dr')->
    orWhere('job_title', '=', 'nurse')->get();
    return view('hours', compact('admin'));
})->name('hours');

Route::get('medicines', function () {
    $medicines = Medicine::all();
    return view('medicines', compact('medicines'));
})->name('medicines');

// prescription routes
Route::get('prescriptions', 'PrescriptionController@index')->name('prescriptions.index');
Route::get('prescriptions/{user}', 'PrescriptionController@user')->name('prescriptions.user');
Route::get('prescriptions/renew/{prescription}', 'PrescriptionController@edit')->name('prescriptions.renew');

// result routes
Route::get('results', 'ResultController@index')->name('results.index');
Route::get('results/{result}', 'ResultController@show')->name('results.show');
Route::get('results/user/{user}', 'ResultController@user')->name('results.user');

// appointment routes
Route::resource('calendar_events', 'CalendarEventController');
Route::post('calendar_events/create', 'CalendarEventController@createByAdmin')->name('calendar_events.create.admin');
Route::get('calendar_events/create', 'CalendarEventController@createByAdmin')->name('calendar_events.create.admin');

Route::get('calendar_events/events/admin/{admin_id}', 'CalendarEventController@eventsByAdmin');
Route::get('calendar_events/events/byadmin', 'CalendarEventController@eventsByAdminPost')->name('calendar_events.events.admin');
Route::post('calendar_events/events/byadmin', 'CalendarEventController@eventsByAdminPost')->name('calendar_events.events.admin');

Route::get('calendar_events/events/user/{user_id}', 'CalendarEventController@eventsByUser')->name('calendar_events.events.user');
Route::post('calendar_events/events/byname', 'CalendarEventController@eventsByUserName')->name('calendar_events.events.userName');
Route::get('calendar_events/events/byname', 'CalendarEventController@eventsByUserName')->name('calendar_events.events.userNameGet');

Auth::routes();
// Admin routes
Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    //Password reset routes
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});