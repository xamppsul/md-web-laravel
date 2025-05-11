<?php

use App\Modules\Administrator\handler\Handler;
use Illuminate\Support\Facades\Route;

Route::middleware(['throttle:30,1', 'auth:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::prefix('master')->group(function () {
            Route::prefix('aset')->group(function () {
                Route::get('/', [Handler::class, 'indexAsset'])->name('admin.master.asset.index');
                Route::get('/create', [Handler::class, 'createAsset'])->name('admin.master.asset.create');
                Route::post('/store', [Handler::class, 'storeAsset'])->name('admin.master.asset.store');
                Route::get('/edit/{id}', [Handler::class, 'editAsset'])->name('admin.master.asset.edit');
                Route::put('/update/{id}', [Handler::class, 'updateAsset'])->name('admin.master.asset.update');
                Route::delete('/destroy/{id}', [Handler::class, 'destroyAsset'])->name('admin.master.asset.destroy');
            });
        });
    });
});
