<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [StudentController::class, 'index']);

Route::post('/create', [StudentController::class, 'createNewStudent'])->name('std.createNew');
