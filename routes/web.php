<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiController;
use App\Http\Middleware\UserAkses;
use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\outro;

Route::middleware(['guest'])->group(function(){
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);   
});
Route::get('/home', function(){
    return redirect('/admin');    
});

Route::middleware(['auth'])->group(function(){
    Route::get('/admin',[AdminController::class, 'index']);
    Route::get('/admin/kepsek',[AdminController::class, 'kepsek'])->middleware('userAkses:kepsek');
    Route::get('/admin/operator',[AdminController::class, 'operator'])->middleware('userAkses:operator');
    Route::get('/admin/guru',[AdminController::class, 'guru'])->middleware('userAkses:guru');
    Route::get('/admin/siswa',[AdminController::class, 'siswa'])->middleware('userAkses:siswa');

    Route::get('/logout',[SesiController::class,'logout']);
});

