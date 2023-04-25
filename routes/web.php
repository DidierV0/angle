<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/admin', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route connecter 
Route::middleware('auth')->group(function () {
    Route::get('/connecte', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/connecte', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/connecte', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route admin 
Route::middleware('auth', 'can:admin')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('/admin/annonce', [AnnonceAdminController::class, 'index'])->name('admin.annonce');

    Route::post('/admin/category/add', [CategoryController::class, 'create'])->name('admin.category.add');
    Route::post('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::get('/admin/category/del/{id}', [CategoryController::class, 'destroy'])->name('admin.category.del');


    // Route::add('/admin/annonce/create', [AnnonceAdminController::class, 'create'])->name('admin.annonce.create');
    // Route::edit('/admin/annonce/edit', [AnnonceAdminController::class, 'edit'])->name('admin.annonce.edit');
});

require __DIR__.'/auth.php';
