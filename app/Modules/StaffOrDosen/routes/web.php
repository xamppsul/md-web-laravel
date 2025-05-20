<?php

use Illuminate\Support\Facades\Route;
use App\Modules\StaffOrDosen\handler\Handler;

Route::middleware(['throttle:30,1', 'auth:user', 'user.staffdosen'])->group(function () {
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
    Route::get('file-manager', [Handler::class, 'indexFileManager'])->name('staffdosen.FileManager.index');
});
