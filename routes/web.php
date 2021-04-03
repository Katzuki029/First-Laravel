<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;


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

Route::get('/user', 'UserController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/upload', function (Request $request) {
    $request->image->store('image', 'public');
    return 'Uploaded';
    // dd($request->hasFile('image'));
});
