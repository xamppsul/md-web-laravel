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
    public function indexMouMoaService($asetDomain, $request);
    public function createMouMoaService();
    public function storeMouMoaService($request, $asetDomain): void;
    public function editMouMoaService(int $id, $asetDomain): array;
    public function updateMouMoaService(int $id, $asetDomain, $request): void;
    public function destroyMouMoaService(int $id, $asetDomain): void;
    /**
     * master kegiatan
     */
    public function indexKegiatanService($asetDomain, $request);
    public function createKegiatanService();
    public function storeKegiatanService($request, $asetDomain): void;
    public function editKegiatanService(int $id, $asetDomain): array;
    public function updateKegiatanService(int $id, $asetDomain, $request): void;
    public function destroyKegiatanService(int $id, $asetDomain): void;
}
