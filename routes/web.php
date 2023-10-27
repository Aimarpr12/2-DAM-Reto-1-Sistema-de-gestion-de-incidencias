<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\PrioridadController;
use App\Http\Controllers\EstadoController;

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
Route::middleware(['auth'])->group(function () {
    Route::get('incidencias/mine', [IncidenciaController::class, 'mine'])->name('incidencias.mine');
    Route::resource('comentarios', ComentarioController::class)->only(['store']);
    Route::resources([
        'posts' => PostController::class,
        'departments' => DepartmentController::class,
        'categorias' => CategoriaController::class,
        'incidencias' => IncidenciaController::class,
        'comentarios' => ComentarioController::class,
        'prioridads' => PrioridadController::class,
        'estados' => EstadoController::class,
    ]);

});

//Rutas sin verificacion

//Estado
Route::controller(EstadoController::class)->group(function () {
    Route::get('/estados', 'index')->name('estados.index');
})->withoutMiddleware([Auth::class]);

//Prioridad
Route::controller(PrioridadController::class)->group(function () {
    Route::get('/prioridads', 'index')->name('prioridads.index');
})->withoutMiddleware([Auth::class]);

//Categorias
Route::controller(CategoriaController::class)->group(function () {
    Route::get('/categorias', 'index')->name('categorias.index');
})->withoutMiddleware([Auth::class]);

//Departamentos
Route::controller(DepartmentController::class)->group(function () {
    Route::get('/departments', 'index')->name('departments.index');
})->withoutMiddleware([Auth::class]);

//IncidenciaController
Route::controller(IncidenciaController::class)->group(function () {
    Route::get('/incidencias', 'index')->name('incidencias.index');
    Route::get('/incidencias{incidencia}', 'show')->name('incidencias.show');
})->withoutMiddleware([Auth::class]);


//Home
Route::get('/', function () {
    return redirect()->route('incidencias.index');
});

Auth::routes();



