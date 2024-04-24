<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProdiController;
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

Route::get('/prodi', [ProdiController::class, 'index']);
Route::get('/prodi/tambah', [ProdiController::class, 'tambah']);
Route::post('/prodi/simpan', [ProdiController::class, 'simpan']);