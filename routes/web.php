<?php

/* use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
 */
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BillController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Redirigir a login si no está autenticado, y al dashboard si lo está
Route::get('/', function () {
    return Auth::check() ? redirect()->route('dashboard') : redirect()->route('login');
});

// Dashboard protegido por autenticación
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grupo de rutas protegidas
Route::middleware(['auth'])->group(function () {
    // CRUD de usuarios (sin index)
    Route::resource('users', UserController::class)->except(['index']);

    // Rutas del perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('productos', ProductController::class);

    // Actualizar stock de un producto específico
    Route::patch('/productos/{producto}/stock', [ProductController::class, 'updateStock'])->name('productos.updateStock');

    Route::resource('bills', BillController::class)->only(['index', 'create', 'store']);
    Route::get('/productos/search', [ProductController::class, 'search'])->name('productos.search');

    Route::get('/productos/{producto}', [ProductController::class, 'show'])->name('productos.show');


});

// Incluir las rutas de autenticación generadas por Laravel Breeze
require __DIR__ . '/auth.php';


