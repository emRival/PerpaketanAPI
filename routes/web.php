<?php

use App\Http\Controllers\editPass;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\Tracking\MusyrifController;
use App\Http\Controllers\Tracking\SatpamController;
use App\Http\Controllers\Tracking\SelesaiController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Route::get('/', [LandingController::class, 'index']);
Route::get('/cari-landing', [LandingController::class, 'search'])->name('cari-landing');



Auth::routes();
Route::match(['get', 'post'], '/register', function () {
    return redirect('login');
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\UserController::class, 'index'])->name('dashboard')->middleware('Auth');
Route::get('/manageuser', [App\Http\Controllers\UserController::class, 'manageuser'])->name('manageuser')->middleware('Auth');
Route::post('/create-user', [UserController::class, 'store'])->name('createuser')->middleware('Auth');
Route::delete('/del-user/{id}', [UserController::class, 'destroy'])->name('deluser')->middleware('Auth');
Route::put('/resetpass/{id}', [UserController::class, 'update'])->name('resetpass')->middleware('Auth');

//DATA SANTRI

//TRACKING PAKET

Route::resource('satpam',SatpamController::class )->middleware('Auth');
Route::resource('musyrif',MusyrifController::class )->middleware('Auth');
Route::resource('selesai',SelesaiController::class )->middleware('Auth');


//USER






Route::middleware('optimizeImages')->group(function () {
    // all images will be optimized automatically
    Route::post('/add-barang', [SearchController::class, 'addbarang']);
});

Route::get('/cari-satpam', [SearchController::class, 'search'])->name('cari.satpam')->middleware('Auth');
Route::get('/cari-musyrif', [SearchController::class, 'searchmusyrif'])->name('cari.musyrif')->middleware('Auth');
Route::get('/cari-diambil', [SearchController::class, 'searchdiambil'])->name('cari.diambil')->middleware('Auth');




Route::get('/ganti', [editPass::class, 'ganti'])->name('ganti')->middleware('Auth');
Route::put('/update-pass', [editPass::class, 'updatePass'])->name('update-pass')->middleware('Auth');