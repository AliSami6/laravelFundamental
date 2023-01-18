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
Route::get('form', function () {
    return view('form');
});
Route::get('/form-ajax', function () {
    return view('form-ajax');
});
Route::get('/table', function () {
    return view('ajax_crud.index');
});
Route::get('generate-pdf', [App\Http\Controllers\PDFController::class, 'generatePDF']);
Route::get('/ajax/data',[AjaxController::class,'GetAjaxData'])->name('ajax.request');
Route::post('from/ajax',[AjaxController::class,'FormAjaxData'])->name('form.ajax');
Route::post('ajax/insert',[AjaxController::class,'FormAjaxStore'])->name('form.submit');
Route::post('/table',[AjaxController::class,'FormAdd'])->name('form.table');
Route::post('/get-table-data',[AjaxController::class,'StudentData'])->name('student.getData');
Route::post('/student-edit',[AjaxController::class,'StudentEdit'])->name('student.edit');
Route::post('/student-select',[AjaxController::class,'SelectStudentData'])->name('student.select');

Route::post('/student-del',[AjaxController::class,'StudentDelete'])->name('student.delete');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/file',[App\Http\Controllers\HomeController::class,'upload'])->name('file.upload');