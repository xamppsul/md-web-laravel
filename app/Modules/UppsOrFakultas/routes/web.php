<?php

use Illuminate\Support\Facades\Route;
use App\Modules\UppsOrFakultas\handler\Handler;

Route::middleware(['auth:user', 'user.uppsfaculty'])->group(function () {
    Route::prefix('aset')->group(function () {
        Route::get('/', [Handler::class, 'indexAsset'])->name('uppsfaculty.Asset.index');
        Route::get('/create', [Handler::class, 'createAsset'])->name('uppsfaculty.Asset.create');
        Route::post('/store', [Handler::class, 'storeAsset'])->name('uppsfaculty.Asset.store');
        Route::get('/edit/{id}', [Handler::class, 'editAsset'])->name('uppsfaculty.Asset.edit');
        Route::put('/update/{id}', [Handler::class, 'updateAsset'])->name('uppsfaculty.Asset.update');
        Route::delete('/destroy/{id}', [Handler::class, 'destroyAsset'])->name('uppsfaculty.Asset.destroy');
    });
    Route::prefix('kerjasama')->group(function () {
        Route::get('/', [Handler::class, 'indexMouMoa'])->name('uppsfaculty.MouMoa.index');
        Route::get('/create', [Handler::class, 'createMouMoa'])->name('uppsfaculty.MouMoa.create');
        Route::post('/store', [Handler::class, 'storeMouMoa'])->name('uppsfaculty.MouMoa.store');
        Route::get('/edit/{id}', [Handler::class, 'editMouMoa'])->name('uppsfaculty.MouMoa.edit');
        Route::put('/update/{id}', [Handler::class, 'updateMouMoa'])->name('uppsfaculty.MouMoa.update');
        Route::delete('/destroy/{id}', [Handler::class, 'destroyMouMoa'])->name('uppsfaculty.MouMoa.destroy');
    });
    Route::prefix('kegiatan')->group(function () {
        Route::get('/', [Handler::class, 'indexKegiatan'])->name('uppsfaculty.Kegiatan.index');
        Route::get('/create', [Handler::class, 'createKegiatan'])->name('uppsfaculty.Kegiatan.create');
        Route::post('/store', [Handler::class, 'storeKegiatan'])->name('uppsfaculty.Kegiatan.store');
        Route::get('/edit/{id}', [Handler::class, 'editKegiatan'])->name('uppsfaculty.Kegiatan.edit');
        Route::put('/update/{id}', [Handler::class, 'updateKegiatan'])->name('uppsfaculty.Kegiatan.update');
        Route::delete('/destroy/{id}', [Handler::class, 'destroyKegiatan'])->name('uppsfaculty.Kegiatan.destroy');
    });
});
