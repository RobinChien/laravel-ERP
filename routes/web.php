<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::group(['middleware' => ['auth']], function (){

    Route::resource('users','UserController');
    Route::get('users/status/{status}/{id}', 'UserController@status')->name('users.status');
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');
    Route::get('permissions/status/{status}/{id}', 'PermissionController@status')->name('permissions.status');
//    Route::get('/admin',[
//        'as' => 'admin.index',
//        'uses' =>function(){
//            return view('admin.index');
//        }
//    ]);
});

