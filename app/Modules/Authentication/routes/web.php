<?php

use App\Modules\Authentication\handler\Handler;
use Illuminate\Support\Facades\Route;

Route::middleware('throttle:30,1')->group(function () {
    Route::get('/', [Handler::class, 'viewUserLogin'])->name('user.view.login');
    Route::post('/login', [Handler::class, 'userLogin'])->name('user.do.login');
    Route::post('/forgot-password', [Handler::class, 'userForgotPassword'])->name('user.do.forgot.password');
    Route::get('/reset/{token}/password', [Handler::class, 'viewUserResetPassword'])->name('user.do.reset.password');
    Route::prefix('md-admin')->group(function () {
        Route::get('/', [Handler::class, 'viewAdminLogin'])->name('admin.view.login');
        Route::post('/login', [Handler::class, 'adminLogin'])->name('admin.do.login');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [Handler::class, 'viewUserDashboard'])->name('user.view.dashboard');
        Route::post('/logout', [Handler::class, 'userLogout'])->name('user.do.logout');
    });
});
