<?php

use App\Modules\Administrator\handler\Handler;
use Illuminate\Support\Facades\Route;

Route::middleware(['throttle:30,1', 'auth:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::prefix('master')->group(function () {
            Route::prefix('aset')->group(function () {
                Route::get('/', [Handler::class, 'indexAsset'])->name('admin.master.Asset.index');
                Route::get('/create', [Handler::class, 'createAsset'])->name('admin.master.Asset.create');
                Route::post('/store', [Handler::class, 'storeAsset'])->name('admin.master.Asset.store');
                Route::get('/edit/{id}', [Handler::class, 'editAsset'])->name('admin.master.Asset.edit');
                Route::put('/update/{id}', [Handler::class, 'updateAsset'])->name('admin.master.Asset.update');
                Route::delete('/destroy/{id}', [Handler::class, 'destroyAsset'])->name('admin.master.Asset.destroy');
            });
            Route::prefix('moumoa')->group(function () {
                Route::get('/', [Handler::class, 'indexMouMoa'])->name('admin.master.MouMoa.index');
                Route::get('/create', [Handler::class, 'createMouMoa'])->name('admin.master.MouMoa.create');
                Route::post('/store', [Handler::class, 'storeMouMoa'])->name('admin.master.MouMoa.store');
                Route::get('/edit/{id}', [Handler::class, 'editMouMoa'])->name('admin.master.MouMoa.edit');
                Route::put('/update/{id}', [Handler::class, 'updateMouMoa'])->name('admin.master.MouMoa.update');
                Route::delete('/destroy/{id}', [Handler::class, 'destroyMouMoa'])->name('admin.master.MouMoa.destroy');
            });
            Route::prefix('kegiatan')->group(function () {
                Route::get('/', [Handler::class, 'indexKegiatan'])->name('admin.master.Kegiatan.index');
                Route::get('/create', [Handler::class, 'createKegiatan'])->name('admin.master.Kegiatan.create');
                Route::post('/store', [Handler::class, 'storeKegiatan'])->name('admin.master.Kegiatan.store');
                Route::get('/edit/{id}', [Handler::class, 'editKegiatan'])->name('admin.master.Kegiatan.edit');
                Route::put('/update/{id}', [Handler::class, 'updateKegiatan'])->name('admin.master.Kegiatan.update');
                Route::delete('/destroy/{id}', [Handler::class, 'destroyKegiatan'])->name('admin.master.Kegiatan.destroy');
            });
        });
        Route::prefix('elfinder')->group(function () {
            Route::get('/', [Handler::class, 'indexElFinder'])->name('admin.elfinder.index');
        });
    });
});
