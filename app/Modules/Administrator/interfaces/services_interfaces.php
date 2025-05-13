<?php

namespace App\Modules\Administrator\interfaces;

interface Services_interfaces
{
    /**
     * master asset
     */
    public function indexAssetService($asetDomain);
    public function createAssetService();
    public function storeAssetService($request, $asetDomain): void;
    public function editAssetService($id, $asetDomain): array;
    public function updateAssetService($id, $asetDomain, $request): void;
    public function destroyAssetService($id, $asetDomain): void;
    /**
     * master moumoa
     */
    public function indexMouMoaService();
    public function createMouMoaService();
    public function storeMouMoaService($request);
    public function editMouMoaService($id);
    public function updateMouMoaService($id);
    public function destroyMouMoaService($id);
    /**
     * master kegiatan
     */
    public function indexKegiatanService();
    public function createKegiatanService();
    public function storeKegiatanService($request);
    public function editKegiatanService($id);
    public function updateKegiatanService($id);
    public function destroyKegiatanService($id);
}
