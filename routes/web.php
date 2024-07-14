<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\StafGuruController;
use App\Http\Controllers\admin\PrestasiController;
use App\Http\Controllers\admin\PPDBController;
use App\Http\Controllers\admin\GaleriController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\EkstrakurikulerController;
use App\Http\Controllers\admin\AgendaterdekatController;


Route::get('/', function () {
    return view('index');
});

// Route::get('/daftar', [AuthController::class,'lamandaftar'])->middleware('guest');
// Route::post('/daftar',[AuthController::class,'daftar']);
Route::get('/masuk', [AuthController::class,'lamanmasuk'])->middleware('guest')->name('login');
Route::post('/masuk',[AuthController::class,'masuk']);
Route::post('/keluar',[AuthController::class,'keluar']);


Route::middleware(['auth'])->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('stafguru', StafGuruController::class);
    Route::resource('prestasi', PrestasiController::class);
    Route::resource('PPDB', PPDBController::class);
    Route::resource('agendaterdekat', AgendaterdekatController::class);
    Route::resource('blog', BlogController::class);
    Route::resource('ekstrakurikuler', EkstrakurikulerController::class);
    Route::resource('galeri', GaleriController::class);

    
});


// Route::middleware(['guest'])->group(function () {
//     Route::resource('staf-guru', ProfileController::class);
//     Route::resource('prestasi', PinjamBukuController::class);
//     Route::resource('PPDB', PinjamBukuController::class);
//     Route::resource('agendaterdekat', PinjamBukuController::class);
//     Route::resource('blog', PinjamBukuController::class);
//     Route::resource('ekstrakurikuler', PinjamBukuController::class);
//     Route::resource('galeri', PinjamBukuController::class);
// });