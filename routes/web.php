<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/todo',[TodoController::class,'todo'])->name('todo');
Route::post('/addtask',[TodoController::class,'addtask'])->name('addtask');
Route::post('/deletetask/{id}',[TodoController::class,'deletetask'])->name('deletetask');