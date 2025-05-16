<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['throttle:30,1', 'auth:user', 'user.uppsfaculty'])->group(function () {
    Route::get('/upps-fakultas', function () {
        return 'hello dari upps fakultas';
    });
});
