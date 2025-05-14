<?php

namespace App\Modules\Administrator\interfaces;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

interface Usecase_intefaces
{
    /**
     * master asset
     */
    public function indexAssetCase(
        $asetDomain,
        $request,
        $constantAdmin,
    ): RedirectResponse|View;
    public function createAssetCase(): View;
    public function storeAssetCase(
        $request,
        $asetDomain,
        $asetRequest
    ): RedirectResponse;
    public function editAssetCase(
        int $id,
        $asetDomain,
        $request,
        $constantAdmin,
    ): RedirectResponse|View;
    public function updateAssetCase(
        int $id,
        $request,
        $asetDomain,
        $asetRequest,
    ): RedirectResponse;
    public function destroyAssetCase(
        int $id,
        $request,
        $asetDomain,
    ): RedirectResponse;
    /**
     * master mou moa
     */
    public function indexMouMoaCase(
        $asetDomain,
        $request,
        $constantAdmin,
    ): RedirectResponse|View;
    public function createMouMoaCase(): View;
    public function storeMouMoaCase(
        $request,
        $asetDomain,
        $asetRequest
    ): RedirectResponse;
    public function editMouMoaCase(
        int $id,
        $asetDomain,
        $request,
        $constantAdmin,
    ): RedirectResponse|View;
    public function updateMouMoaCase(
        int $id,
        $request,
        $asetDomain,
        $asetRequest,
    ): RedirectResponse;
    public function destroyMouMoaCase(
        int $id,
        $request,
        $asetDomain,
    ): RedirectResponse;
    /**
     * master kegiatan
     */
    public function indexKegiatanCase(
        $asetDomain,
        $request,
        $constantAdmin,
    ): RedirectResponse|View;
    public function createKegiatanCase(): View;
    public function storeKegiatanCase(
        $request,
        $asetDomain,
        $asetRequest
    ): RedirectResponse;
    public function editKegiatanCase(
        int $id,
        $asetDomain,
        $request,
        $constantAdmin,
    ): RedirectResponse|View;
    public function updateKegiatanCase(
        int $id,
        $request,
        $asetDomain,
        $asetRequest,
    ): RedirectResponse;
    public function destroyKegiatanCase(
        int $id,
        $request,
        $asetDomain,
    ): RedirectResponse;
}
