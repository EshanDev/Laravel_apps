<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reference\ReferenceController;


Route::get('/', [ReferenceController::class, 'index']);