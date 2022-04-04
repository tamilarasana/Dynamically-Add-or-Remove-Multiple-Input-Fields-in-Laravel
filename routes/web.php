<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\MultipleImagesController;

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
    return redirect('form/new');
});

Route::get('form/new', [App\Http\Controllers\FormController::class, 'index'])->name('form/new');
Route::post('form/save', [App\Http\Controllers\FormController::class, 'saveRecord'])->name('form/save');


Route::get('/img',  [App\Http\Controllers\MultipleImagesController::class,'index']);
Route::post('upload_data', [App\Http\Controllers\MultipleImagesController::class,'store']);
