<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\GarageController;
use App\Http\Controllers\WeatherController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/todo',[TodoController::class,'todo'])->name('todo');
Route::post('/addtask',[TodoController::class,'addtask'])->name('addtask');
Route::post('/deletetask/{id}',[TodoController::class,'deletetask'])->name('deletetask');

//for the garage part
Route::get('/home',[GarageController::class,'home'])->name('garage');
Route::post('/login',[GarageController::class,'login'])->name('login');
Route::get('/login',[GarageController::class,'loginget'])->name('loginget');
Route::get('/register',[GarageController::class,'registerget'])->name('registerget');
Route::post('/register',[GarageController::class,'register'])->name('register');
Route::get('/notifications',[GarageController::class,'notifications'])->name('notifications');
Route::post('/payment',[GarageController::class,'payment'])->name('payment');

//for the weather part
Route::post('/weather/',[WeatherController::class,'getWeather'])->name('weather');
Route::get('/weather/',[WeatherController::class,'getWeather1'])->name('weather1');