<?php

use Illuminate\Support\Facades\Route;
use App\Modules\StaffOrDosen\handler\Handler;

Route::middleware(['auth:user', 'user.staffdosen'])->group(function () {
    Route::prefix('bahanAjar')->group(function () {
        Route::get('/', [Handler::class, 'indexBahanAjar'])->name('staffdosen.BahanAjar.index');
        Route::get('/create', [Handler::class, 'createBahanAjar'])->name('staffdosen.BahanAjar.create');
        Route::post('/store', [Handler::class, 'storeBahanAjar'])->name('staffdosen.BahanAjar.store');
        Route::get('/edit/{id}', [Handler::class, 'editBahanAjar'])->name('staffdosen.BahanAjar.edit');
        Route::put('/update/{id}', [Handler::class, 'updateBahanAjar'])->name('staffdosen.BahanAjar.update');
        Route::delete('/destroy/{id}', [Handler::class, 'destroyBahanAjar'])->name('staffdosen.BahanAjar.destroy');
    });
    Route::prefix('penelitian')->group(function () {
        Route::get('/', [Handler::class, 'indexPenelitian'])->name('staffdosen.Penelitian.index');
        Route::get('/create', [Handler::class, 'createPenelitian'])->name('staffdosen.Penelitian.create');
        Route::post('/store', [Handler::class, 'storePenelitian'])->name('staffdosen.Penelitian.store');
        Route::get('/edit/{id}', [Handler::class, 'editPenelitian'])->name('staffdosen.Penelitian.edit');
        Route::put('/update/{id}', [Handler::class, 'updatePenelitian'])->name('staffdosen.Penelitian.update');
        Route::delete('/destroy/{id}', [Handler::class, 'destroyPenelitian'])->name('staffdosen.Penelitian.destroy');
    });
    Route::prefix('pengabdian')->group(function () {
        Route::get('/', [Handler::class, 'indexPengabdian'])->name('staffdosen.Pengabdian.index');
        Route::get('/create', [Handler::class, 'createPengabdian'])->name('staffdosen.Pengabdian.create');
        Route::post('/store', [Handler::class, 'storePengabdian'])->name('staffdosen.Pengabdian.store');
        Route::get('/edit/{id}', [Handler::class, 'editPengabdian'])->name('staffdosen.Pengabdian.edit');
        Route::put('/update/{id}', [Handler::class, 'updatePengabdian'])->name('staffdosen.Pengabdian.update');
        Route::delete('/destroy/{id}', [Handler::class, 'destroyPengabdian'])->name('staffdosen.Pengabdian.destroy');
    });
    Route::prefix('riwayatJabatan')->group(function () {
        Route::get('/', [Handler::class, 'indexRiwayatJabatan'])->name('staffdosen.RiwayatJabatan.index');
        Route::get('/create', [Handler::class, 'createRiwayatJabatan'])->name('staffdosen.RiwayatJabatan.create');
        Route::post('/store', [Handler::class, 'storeRiwayatJabatan'])->name('staffdosen.RiwayatJabatan.store');
        Route::get('/edit/{id}', [Handler::class, 'editRiwayatJabatan'])->name('staffdosen.RiwayatJabatan.edit');
        Route::put('/update/{id}', [Handler::class, 'updateRiwayatJabatan'])->name('staffdosen.RiwayatJabatan.update');
        Route::delete('/destroy/{id}', [Handler::class, 'destroyRiwayatJabatan'])->name('staffdosen.RiwayatJabatan.destroy');
    });
    Route::prefix('listPublikasi')->group(function () {
        Route::get('/', [Handler::class, 'indexListPublikasi'])->name('staffdosen.ListPublikasi.index');
        Route::get('/create', [Handler::class, 'createListPublikasi'])->name('staffdosen.ListPublikasi.create');
        Route::post('/store', [Handler::class, 'storeListPublikasi'])->name('staffdosen.ListPublikasi.store');
        Route::get('/edit/{id}', [Handler::class, 'editListPublikasi'])->name('staffdosen.ListPublikasi.edit');
        Route::put('/update/{id}', [Handler::class, 'updateListPublikasi'])->name('staffdosen.ListPublikasi.update');
        Route::delete('/destroy/{id}', [Handler::class, 'destroyListPublikasi'])->name('staffdosen.ListPublikasi.destroy');
    });
    Route::get('file-manager-staffdosen', [Handler::class, 'indexFileManager'])->name('staffdosen.FileManager.index');
});
