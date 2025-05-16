<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['throttle:30,1', 'auth:user', 'user.staffdosen'])->group(function () {
    Route::get('/staff-dosen', function () {
        return 'hello dari staff dosen';
    });
});
