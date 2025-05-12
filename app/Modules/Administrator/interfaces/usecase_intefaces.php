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
        $id,
        $asetDomain,
        $request,
        $constantAdmin,
    ): RedirectResponse|View;
    public function updateAssetCase($id);
    public function destroyAssetCase($id);
    /**
     * master mou moa
     */
    public function indexMouMoaCase(): RedirectResponse|View;
    public function createMouMoaCase(): View;
    public function storeMouMoaCase($request);
    public function editMouMoaCase($id);
    public function updateMouMoaCase($id);
    public function destroyMouMoaCase($id);
    /**
     * master kegiatan
     */
    public function indexKegiatanCase(): RedirectResponse|View;
    public function createKegiatanCase(): View;
    public function storeKegiatanCase($request);
    public function editKegiatanCase($id);
    public function updateKegiatanCase($id);
    public function destroyKegiatanCase($id);
}
