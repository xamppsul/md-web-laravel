<?php

use App\Modules\Authentication\handler\Handler;
use Illuminate\Support\Facades\Route;

Route::get('/', [Handler::class, 'viewUserLogin'])->name('view.login');
Route::post('/login', [Handler::class, 'userLogin'])->name('do.login');
