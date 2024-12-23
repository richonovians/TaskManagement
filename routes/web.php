<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Route::resource('task', TaskController::class);
Route::prefix('task')->group(function () {
    Route::get('/', [TaskController::class, 'show'])->name('task.show');
    Route::get('/add', [TaskController::class, 'add'])->name('task.add');
    Route::post('/task/submit', [TaskController::class, 'submit'])->middleware('auth')->name('task.submit');
    Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('task.edit');
    Route::get('/{id}/detail', [TaskController::class, 'detail'])->name('task.detail');
    Route::post('/update/{id}', [TaskController::class, 'update'])->name('task.update');
    Route::post('/delete/{id}', [TaskController::class, 'delete'])->name('task.delete');
});

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::get('/{id}/detail', [CategoryController::class, 'detail'])->name('categories.detail');
    Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::post('/destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

Route::group(['middleware' => ['role:admin']], function () {
    // Rute yang hanya dapat diakses oleh pengguna dengan peran 'admin'
      Route::get('/admin', [AdminController::class, 'index']);

});

// Route::group(['middleware' => ['can:create posts']], function () { ... });


// Route::middleware(['auth', 'permission:create posts'])->group(function () {
//     // Rute yang hanya dapat diakses oleh pengguna dengan izin 'create posts'
//     Route::post('/posts', [PostController::class, 'store']);
// });





require __DIR__.'/auth.php';
