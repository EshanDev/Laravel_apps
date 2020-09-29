<?php

use App\Http\Controllers\Reg\RegController;
use Illuminate\Support\Facades\Route;





Route::get('/', [RegController::class, 'index'])->name('reg.index');
Route::get('/verify_code', [RegController::class, 'verify_code'])->name('reg.verify.code');
Route::get('/verify', function(){
   echo 'ok';
})->name('reg.register');
