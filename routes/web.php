<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

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

Route::get('/',[FrontController::class, 'index'])->name('home');
Route::post('/new-employee',[
    'uses' => 'App\Http\Controllers\CrudController@newEmployee',
    'as' => 'new-employee'
]);
Route::get('/edit-employee-info',[
    'uses' =>'App\Http\Controllers\CrudController@employeeinfo',
    'as' => 'get-message-info'
]);
Route::post('/update-info',[
    'uses' => 'App\Http\Controllers\CrudController@updateEmployee',
    'as' => 'update-info'
]);
Route::get('/delete-employee/{id}',[
    'uses' =>'App\Http\Controllers\CrudController@deleteEmployee',
    'as' => 'delete-employee'
]);
Route::get('/delete-all-info',[
    'uses' =>'App\Http\Controllers\CrudController@deleteAllEmployee',
    'as' => 'delete-all-info'
]);

