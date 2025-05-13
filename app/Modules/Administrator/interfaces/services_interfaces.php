<?php

namespace App\Modules\Administrator\interfaces;

interface Services_interfaces
{
    /**
     * master asset
     */
    public function indexAssetService($asetDomain, $request);
    public function createAssetService();
    public function storeAssetService($request, $asetDomain): void;
    public function editAssetService(int $id, $asetDomain): array;
    public function updateAssetService(int $id, $asetDomain, $request): void;
    public function destroyAssetService(int $id, $asetDomain): void;
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
