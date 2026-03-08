<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('tasks', App\Http\Controllers\TaskController::class);

Route::get('/', function(){
    return redirect()->route('tasks.index');
});


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
