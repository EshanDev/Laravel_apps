<?php
use App\Http\Controllers\Reg\RegController;
use Illuminate\Support\Facades\Route;





Route::get('/', [RegController::class, 'index'])->name('reg.index');
Route::get('/reg_create', [RegController::class, 'show_form'])->name('form.reg');
Route::post('/condition', [RegController::class, 'regCode_create'])->name('reg.code.create');


Route::get('/verify_code', [RegController::class, 'verify_code'])->name('reg.verify.code');
Route::get('/verify', function(){
   echo 'ok';
})->name('reg.register');
