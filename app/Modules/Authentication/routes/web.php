<?php

use App\Modules\Authentication\handler\Handler;
use Illuminate\Support\Facades\Route;

Route::get('/', [Handler::class, 'viewUserLogin'])->name('user.view.login');
Route::post('/login', [Handler::class, 'userLogin'])->name('user.do.login');
Route::prefix('admin')->group(function () {
    Route::get('/', [Handler::class, 'viewAdminLogin'])->name('admin.view.login');
    Route::post('/login', [Handler::class, 'adminLogin'])->name('admin.do.login');
});
