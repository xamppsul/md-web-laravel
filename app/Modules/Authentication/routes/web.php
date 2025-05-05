<?php

use App\Modules\Authentication\handler\Handler;
use Illuminate\Support\Facades\Route;

Route::get('/', [Handler::class, 'viewLogin'])->name('view.login');
Route::post('/login', [Handler::class, 'login'])->name('do.login');
