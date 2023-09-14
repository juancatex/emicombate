<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SoldadosController;
use App\Http\Controllers\CombateController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(Auth::check()){ 
        return redirect('inicio') ;
    }else{
        return Inertia::render('Auth/Login');
    }
});
Route::fallback(function () {
    return redirect('/');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/inicio', [ProfileController::class, 'inicio'])->name('inicio');
    Route::get('/soldado', [SoldadosController::class, 'index'])->name('soldado');
    Route::post('/GuardarSoldado', [SoldadosController::class, 'store'])->name('GuardarSoldado');

    Route::get('/combate', [CombateController::class, 'index'])->name('combate');
    Route::post('/Guardarcombate', [CombateController::class, 'store'])->name('Guardarcombate');
    Route::get('/reportercombate', [CombateController::class, 'reporte'])->name('reportercombate');
 
});

require __DIR__.'/auth.php';
