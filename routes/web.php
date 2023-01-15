<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
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
    //Mail::to('alisamicse320@gmail.com')->send(new WelcomeMail);
    return view('welcome');
});

Route::get('/ajax', function () {

    return view('ajax');
});
Route::get('generate-pdf', [App\Http\Controllers\PDFController::class, 'generatePDF']);
Route::get('/ajax/data',[AjaxController::class,'GetAjaxData'])->name('ajax.request');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/file',[App\Http\Controllers\HomeController::class,'upload'])->name('file.upload');