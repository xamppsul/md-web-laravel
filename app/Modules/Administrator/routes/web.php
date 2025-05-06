<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['throttle:30,1', 'auth:admin'])->group(function () {
    Route::get('/administrator', function () {
        return 'hello dari administrator';
    });
});
