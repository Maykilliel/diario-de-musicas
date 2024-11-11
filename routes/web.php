<?php

// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EstiloMusicalController;
use App\Http\Controllers\InstrumentoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MusicaController;


Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('estilos-musicais', EstiloMusicalController::class);

Route::resource('instrumentos', InstrumentoController::class);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return 'Bem-vindo ao painel!';
    });

    Route::resource('instrumentos', InstrumentoController::class);
    Route::resource('estilos-musicais', EstiloMusicalController::class);
});

Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::resource('instrumentos.musicas', MusicaController::class);

Route::get('instrumentos/{instrumento}/musicas', [MusicaController::class, 'index'])->name('musicas.index');
Route::get('instrumentos/{instrumento}/musicas/create', [MusicaController::class, 'create'])->name('musicas.create');
Route::post('instrumentos/{instrumento}/musicas', [MusicaController::class, 'store'])->name('musicas.store');
Route::get('instrumentos/{instrumento}/musicas/{musica}', [MusicaController::class, 'show'])->name('musicas.show');
Route::get('instrumentos/{instrumento}/musicas/{musica}/edit', [MusicaController::class, 'edit'])->name('musicas.edit');
Route::put('instrumentos/{instrumento}/musicas/{musica}', [MusicaController::class, 'update'])->name('musicas.update');
Route::delete('instrumentos/{instrumento}/musicas/{musica}', [MusicaController::class, 'destroy'])->name('musicas.destroy');
