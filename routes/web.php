<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ConstructionController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\AvisoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
    Route::get('/constructions', [ConstructionController::class, 'index'])->name('ConstructionControllerIndex');
    Route::get('/constructions/create', [ConstructionController::class,'create'])->name('ConstructionControllerCreate');
    Route::get('/constructions/store', [ConstructionController::class,'store'])->name('ConstructionControllerStore');
    Route::get('/constructions/edit/{id}', [ConstructionController::class,'edit'])->name('ConstructionControllerEdit');
    Route::put('/constructions/update/{id}', [ConstructionController::class,'update'])->name('ConstructionControllerUpdate');
    Route::delete('/constructions/destroy/{id}', [ConstructionController::class,'destroy'])->name('ConstructionControllerDestroy');

    Route::get('/user', [UserController::class, 'index'])->name('UserControllerIndex');
    Route::get('/user/create', [UserController::class,'create'])->name('UserControllerCreate');
    Route::get('/user/store', [UserController::class,'store'])->name('UserControllerStore');
    Route::get('/user/edit/{id}', [UserController::class,'edit'])->name('UserControllerEdit');
    Route::put('/user/update/{id}', [UserController::class,'update'])->name('UserControllerUpdate');
    Route::delete('/user/destroy/{id}', [UserController::class,'destroy'])->name('UserControllerDestroy');

    Route::get('/avisos', [AvisoController::class, 'index'])->name('AvisoControllerIndex');
    Route::get('/avisos/create', [AvisoController::class,'create'])->name('AvisoControllerCreate');
    Route::get('/avisos/store', [AvisoController::class,'store'])->name('AvisoControllerStore');
    Route::get('/avisos/edit/{id}', [AvisoController::class,'edit'])->name('AvisoControllerEdit');
    Route::put('/avisos/update/{id}', [AvisoController::class,'update'])->name('AvisoControllerUpdate');
    Route::delete('/avisos/destroy/{id}', [AvisoController::class,'destroy'])->name('AvisoControllerDestroy');

    Route::get('/relatorios', [RelatorioController::class, 'index'])->name('RelatorioControllerIndex');
    Route::get('/relatorios/create', [RelatorioController::class,'create'])->name('RelatorioControllerCreate');
    Route::get('/relatorios/store', [RelatorioController::class,'store'])->name('RelatorioControllerStore');
    Route::get('/relatorios/edit/{id}', [RelatorioController::class,'edit'])->name('RelatorioControllerEdit');
    Route::put('/relatorios/update/{id}', [RelatorioController::class,'update'])->name('RelatorioControllerUpdate');
    Route::delete('/relatorios/destroy/{id}', [RelatorioController::class,'destroy'])->name('RelatorioControllerDestroy');
});

require __DIR__.'/auth.php';
