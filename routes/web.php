<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PeliculasController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


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
    return view('web.inicio');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'rol:admin'])->group(function () {
    Route::get('/peliculas', [PeliculasController::class, 'index'])->name('peliculas.index');
    Route::get('/usuarios', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/peliculas/nuevo/nuevo', [PeliculasController::class, 'create']);
    Route::post('/peliculas/crear', [PeliculasController::class, 'store']);
    Route::get('usuarios/{usuario}/agregar', [PeliculasController::class, 'agregar']);
    Route::get('/peliculas/{pelicula}', [PeliculasController::class, 'show'])->name('peliculas.show');
    Route::get('/peliculas/{pelicula}/borrar', [PeliculasController::class, 'destroy']);

});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/peliculas', [PeliculasController::class, 'index'])->name('peliculas.index');
    Route::get('/usuarios', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/peliculas/nuevo/nuevo', [PeliculasController::class, 'create']);
    Route::post('/peliculas/crear', [PeliculasController::class, 'store']);
    Route::get('usuarios/{usuario}/agregar', [PeliculasController::class, 'agregar']);
    Route::post('/usuarios/{usuario}/registrar', [PeliculasController::class, 'registrar']);
    Route::get('/peliculas/{pelicula}', [PeliculasController::class, 'show'])->name('peliculas.show');
    Route::post('pay', [PaymentController::class, 'pay'])->name('payment');
    Route::get('success', [PaymentController::class, 'success']);
    Route::get('error', [PaymentController::class, 'error']);
    Route::get('/factura/pelicula/{pelicula}/inversion/{inversion}/payment/{payment}', [PaymentController::class, 'factura'])->name('factura');
    Route::post('/pelicula/buscarPelicula', [PeliculasController::class, 'buscarPelicula'])->name('buscarPelicula');
    Route::get('/usuarios/{user}', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/usuario/buscarUsuario', [ProfileController::class, 'buscarUsuario'])->name('buscarUsuario');

});



Route::get('/inicio', [PeliculasController::class, 'inicio']);
Route::get('/dashboard', [PeliculasController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
