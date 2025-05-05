<?php

use App\Modules\Authentication\handler\Handler;
use Illuminate\Support\Facades\Route;

Route::get('/', [Handler::class, 'viewLogin'])->name('login');
