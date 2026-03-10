<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas Laravel UI
Auth::routes();

Route::get('/home', function(){
    return redirect()->route('tasks.index');
});

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::resource('tasks', TaskController::class);
});

//Route::resource('tasks', App\Http\Controllers\TaskController::class);


// CRUD DE TAREAS EXITOSO
//Route::get('/', function(){
//    return redirect()->route('tasks.index');
//});


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
