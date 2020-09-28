<?php


use App\Http\Controllers\Reference\DatabaseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function(){
    return "Database Manager";
});
Route::get('/serials', function (){
    DB::table('serials')->truncate();
    return "ข้อมูลถูกลบหมดแล้ว";
});

Route::get('/count_serials', function(){
    $count = CountSerials();
    return $count;
});


Route::get('/check/email', [DatabaseController::class, 'email_serials'])->name('serials.email.check');

Route::get('/email/all', function(){
    $email = DB::table('serials')->get();
    dd($email);
});


Route::get('/remote/test', [DatabaseController::class, 'remote'])->name('test.remote');
Route::post('/remote/test', [DatabaseController::class, 'checkEmail'])->name('test.remote.post');
