<?php

use App\Http\Controllers\importcontroller;
use App\Http\Controllers\import2controller;
use Illuminate\Support\Facades\Route;

Route::get('/', [importcontroller::class, 'index']);
Route::get('/sheet2', [import2controller::class, 'index'])->name('sheet2.index');
Route::post('/import/sheet2', [import2controller::class, 'importSheet2'])->name('import.sheet2');
Route::post('/import/sheet3', [importcontroller::class, 'importSheet3']);
