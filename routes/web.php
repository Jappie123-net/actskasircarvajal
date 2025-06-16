<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// // Route::get('/', function () {
// //     return view('welcome');
// // });

// Route::get('/', [StudentController::class, 'index']);

// Route::post('/create', [StudentController::class, 'createNewStudent'])->name('std.createNew');

// Route::post('/update/{id}', [StudentController::class, 'updateStudent'])->name('std.update');
// Route::get('/delete/{id}', [StudentController::class, 'deleteStudent'])->name('std.delete');

Route::get('/', function () {
    return redirect('/login');
});

require __DIR__.'/auth.php';

// Group that requires authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::post('/create', [StudentController::class, 'createNewStudent'])->name('std.createNew');
    Route::post('/update/{id}', [StudentController::class, 'updateStudent'])->name('std.update');
    Route::get('/delete/{id}', [StudentController::class, 'deleteStudent'])->name('std.delete');
});

