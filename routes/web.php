<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\AnnonceAdminController;
use App\Http\Controllers\connecte\ConnecteController;
use App\Http\Controllers\VisiteurControlleur;

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

// Route::get('/bienven', function () {
//     return view('visiteur.bienvenue');
// });
Route::get('visiteur/bienvenue', [VisiteurControlleur::class, 'index'])->name('bienvenue');
Route::get('visiteur/annonce/{id}', [VisiteurControlleur::class, 'show'])->name('annonce');

// Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
// Route::get('/admin', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// Route::middleware('auth')->group(function () {
//     Route::get('/connecte', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/connecte', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/connecte', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


// Route connecter 
Route::middleware('auth')->group(function () {
    Route::get('/compte', [ConnecteController::class, 'index'])->name('compte');

    Route::get('/ajouter', [ConnecteController::class, 'create'])->name('ajouter');
    Route::post('/ajouter/store', [ConnecteController::class, 'store'])->name('ajouter.store');

    Route::get('/modifier/edit/{id}', [ConnecteController::class, 'edit'])->name('modifier.edit');
    Route::post('/modifier/upp/{id}', [ConnecteController::class, 'update'])->name('modifier.upp');

});


// Route admin 
Route::middleware('auth', 'can:admin')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('/admin/annonce/', [AnnonceAdminController::class, 'index'])->name('admin.annonce');

    Route::post('/admin/category/add', [CategoryController::class, 'create'])->name('admin.category.add');
    Route::post('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::get('/admin/category/del/{id}', [CategoryController::class, 'destroy'])->name('admin.category.del');


    Route::get('/admin/annonce/create', [AnnonceAdminController::class, 'create'])->name('admin.annonce.create');
    Route::post('/admin/annonce/store', [AnnonceAdminController::class, 'store'])->name('admin.annonce.store');


    Route::get('/admin/annonce/edit/{id}', [AnnonceAdminController::class, 'edit'])->name('admin.annonce.edit');
    Route::post('/admin/annonce/upp/{id}', [AnnonceAdminController::class, 'update'])->name('admin.annonce.upp');

    Route::get('/admin/annonce/del{id}', [AnnonceAdminController::class, 'destroy'])->name('admin.annonce.del');
    Route::get('/admin/annonce/afficher{id}', [AnnonceAdminController::class, 'show'])->name('admin.annonce.aff');

});

require __DIR__.'/auth.php';
