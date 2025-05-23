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
        $mouMoaDomain,
        $request,
        $constantAdmin,
    ): RedirectResponse|View;
    public function createMouMoaCase(): View;
    public function storeMouMoaCase(
        $request,
        $mouMoaDomain,
        $mouMoaRequest
    ): RedirectResponse;
    public function editMouMoaCase(
        int $id,
        $mouMoaDomain,
        $request,
        $constantAdmin,
    ): RedirectResponse|View;
    public function updateMouMoaCase(
        int $id,
        $request,
        $mouMoaDomain,
        $mouMoaRequest,
    ): RedirectResponse;
    public function destroyMouMoaCase(
        int $id,
        $request,
        $mouMoaDomain,
    ): RedirectResponse;
    /**
     * master kegiatan
     */
    public function indexKegiatanCase(
        $kegiatanDomain,
        $request,
        $constantAdmin,
    ): RedirectResponse|View;
    public function createKegiatanCase(): View;
    public function storeKegiatanCase(
        $request,
        $kegiatanDomain,
        $kegiatanRequest
    ): RedirectResponse;
    public function editKegiatanCase(
        int $id,
        $kegiatanDomain,
        $request,
        $constantAdmin,
    ): RedirectResponse|View;
    public function updateKegiatanCase(
        int $id,
        $request,
        $kegiatanDomain,
        $kegiatanRequest,
    ): RedirectResponse;
    public function destroyKegiatanCase(
        int $id,
        $request,
        $kegiatanDomain,
    ): RedirectResponse;

    /**
     * master user
     */
    public function indexUserMasterCase(
        $userMasterDomain,
        $request,
        $constantAdmin,
    ): RedirectResponse|View;
    public function createUserMasterCase(): View;
    public function storeUserMasterCase(
        $request,
        $userMasterDomain,
        $userMasterRequest
    ): RedirectResponse;
    public function editUserMasterCase(
        int $id,
        $userMasterDomain,
        $request,
        $constantAdmin,
    ): RedirectResponse|View;
    public function updateUserMasterCase(
        int $id,
        $request,
        $userMasterDomain,
        $userMasterRequest,
    ): RedirectResponse;
    public function destroyUserMasterCase(
        int $id,
        $request,
        $userMasterDomain,
    ): RedirectResponse;
    /**
     * elfinder
     */

    public function indexElfinderCase(
        $elfinderDomain,
        $request,
    ): RedirectResponse|View;

    /**
     * log master
     */
    public function indexLogUserCase(
        $logMasterDomain,
        $request,
    ): RedirectResponse|View;
}
