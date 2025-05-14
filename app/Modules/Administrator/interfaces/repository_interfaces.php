<?php

namespace App\Modules\Administrator\interfaces;

interface Repository_interfaces
{
    /**===========================================================================
     * feature: master data aset 
    /**===========================================================================
     */
    public function indexAssetRepository($asetDomain, $request);
    public function createAssetRepository();
    public function storeAssetRepository($request, $asetDomain): void;
    public function editAssetRepository(int $id, $asetDomain): array;
    public function updateAssetRepository(int $id, $asetDomain, $request): void;
    public function destroyAssetRepository(int $id, $asetDomain): void;

    /**===========================================================================
     * feature: master data mou moa 
    /**===========================================================================
     */
    public function indexMouMoaRepository($asetDomain, $request);
    public function createMouMoaRepository();
    public function storeMouMoaRepository($request, $asetDomain): void;
    public function editMouMoaRepository(int $id, $asetDomain): array;
    public function updateMouMoaRepository(int $id, $asetDomain, $request): void;
    public function destroyMouMoaRepository(int $id, $asetDomain): void;

    /**===========================================================================
     * feature: master data kegiatan 
    /**===========================================================================
     */
    public function indexKegiatanRepository($asetDomain, $request);
    public function createKegiatanRepository();
    public function storeKegiatanRepository($request, $asetDomain): void;
    public function editKegiatanRepository(int $id, $asetDomain): array;
    public function updateKegiatanRepository(int $id, $asetDomain, $request): void;
    public function destroyKegiatanRepository(int $id, $asetDomain): void;
}
