<?php
use App\Utils;
use App\Member;
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

Auth::routes();

Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home']);
Route::get('/contact', function () { return view('home.contact')->with('active', 'contact');})->name('contact');
Route::get('/about', function () { return view('home.about')->with('active', 'about');})->name('about');
Route::get('/how-it-works', function () { return view('home.how')->with('active', 'how');})->name('how');
Route::get('/countries', ['uses' => 'HomeController@getcountries', 'as' => 'country']);
Route::get('/countries/{id}/states', ['uses' => 'HomeController@getstates', 'as' => 'state']);
Route::get('/states/{id}/towns', ['uses' => 'HomeController@getcities', 'as' => 'town']);

Route::group(['prefix' => 'user', 'middleware' => 'auth.role:user'], function(){
    Route::get('dashboard', ['uses' => 'UserController@dashboard', 'as' => 'user.dashboard']);
    Route::get('profile', ['uses' => 'UserController@profile', 'as' => 'user.profile']);
    Route::post('profile', ['uses' => 'UserController@editprofile', 'as' => 'user.profile']);
    Route::get('compensations', ['uses' => 'UserController@compensation', 'as' => 'user.compensation']);

    Route::get('downlines', ['uses' => 'UserController@downline', 'as' => 'user.downlines']);

    Route::get('downlines/create', function () {return view('user.createdownline');})->name('user.downlines.create');
    Route::post('downlines/create', ['uses' => 'UserController@adddownline', 'as' => 'user.downline.create']);

    Route::get('downline/tree', ['uses' => 'UserController@downlineTree', 'as' => 'user.downline.tree']);

    Route::get('upline', function () { return view('user.upline');})->name('user.upline');

    Route::post('feedback', ['uses' => 'UserController@feedback', 'as' => 'user.feedback']);
    Route::get('feedback', function () {
        return view('user.feedback');
    })->name('user.feedback');

    Route::get('level_count', ['uses' => 'UserController@get_level_counts', 'as' => 'user.level.count']);
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/announcements', ['uses' => 'HomeController@getannouncements', 'as' => 'announcement']);
    Route::post('/account/photo', ['uses' => 'AccountController@changephoto', 'as' => 'changephoto']);
    Route::post('/account/resetpassword', ['uses' => 'AccountController@resetpassword', 'as' => 'resetpassword']);
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth.role:admin'], function(){
    Route::get('dashboard', ['uses' => 'AdminController@dashboard', 'as' => 'admin.dashboard']);
    Route::get('users', ['uses' => 'AdminController@users', 'as' => 'admin.users']);
    Route::get('users/create', function () { return view('admin.createusers');})->name('admin.users.create');
    Route::post('users/create', ['uses' => 'AdminController@create_user', 'as' => 'admin.users.create']);
    Route::get('users/{id}', ['uses' => 'AdminController@viewuser', 'as' => 'admin.user']);
    Route::get('users/{id}/{status}', ['uses' => 'AdminController@changeuserstatus', 'as' => 'admin.user.status']);
    Route::get('compensations', ['uses' => 'AdminController@compensations', 'as' => 'admin.compensations']);
    Route::post('compensations', ['uses' => 'AdminController@update_compensations', 'as' => 'admin.compensations']);
    Route::get('announcements', ['uses' => 'AdminController@announcements', 'as' => 'admin.announcements']);
    Route::get('announcements/create', function () { return view('admin.createannouncements');})->name('admin.announcements.create');
    Route::post('announcements/create', ['uses' => 'AdminController@create_announcement', 'as' => 'admin.announcements.create']);
});

Route::group(['prefix' => 'superadmin', 'middleware' => 'auth'], function(){

});