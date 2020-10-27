<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\medicoController;


Route::get('/list',  [medicoController::class,'list']);

Route::get('/profissional/{id}',  [medicoController::class,'profissional_list']);

Route::get('/como',  [medicoController::class,'como_conheceu']);

Route::post('/create',  [medicoController::class,'create']);
