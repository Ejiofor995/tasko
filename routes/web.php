<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/',[TaskController::class,'index'])->name('home_page');

Route::post('/create',[TaskController::class,'store'])->name('create_task');

Route::post('/edit', [TaskController::class, 'edit'])->name('refine_task');

Route::put('/update',[TaskController::class, 'update'])->name('update_task');

Route::delete('/delete', [TaskController::class, 'destroy'])->name('delete_task');

// index route, same controller☑️
// store route, same controller☑️
// edit route, same "☑️
// update route, same "
// delete route, same "



















Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
