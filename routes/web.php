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


Route::controller(PostController::class)->group(function () {
    Route::get('/departments', 'index')->name('departments.index');
    Route::get('/departments/{department}', 'show')->name('departments.show');
    Route::get('/incidencias/{incidencia}', 'show')->name('incidencias.show');
    Route::get('/incidencias/{incidencia}', [IncidenciaController::class, 'show'])->name('incidencia.show');

    //Route::get('/mostrar-formulario', 'IncidenciaController@mostrarFormulario');
})->withoutMiddleware([Auth::class]);


Route::get('/', function () {
    return redirect()->route('incidencias.index');
});

Route::resources([
    'posts' => PostController::class,
    'departments' => DepartmentController::class,
    'categorias' => CategoriaController::class,
    'incidencias' => IncidenciaController::class,
    ]);

Auth::routes();



