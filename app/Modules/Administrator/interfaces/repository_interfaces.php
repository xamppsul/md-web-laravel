<?php

namespace App\Modules\Administrator\interfaces;

interface Repository_interfaces
{
    /**===========================================================================
     * feature: master data aset 
    /**===========================================================================
     */
    /**
     * master data asset
     */
    public function indexAssetRepository($asetDomain);
    public function createAssetRepository();
    public function storeAssetRepository($request, $asetDomain): void;
    public function editAssetRepository(int $id, $asetDomain): array;
    public function updateAssetRepository(int $id, $asetDomain, $request): void;
    public function destroyAssetRepository(int $id, $asetDomain): void;

    /**===========================================================================
     * feature: master data mou moa 
    /**===========================================================================
     */
    /**
     * master data mou moa
     */
    public function indexMouMoaRepository();
    public function createMouMoaRepository();
    public function storeMouMoaRepository($request);
    public function editMouMoaRepository($id);
    public function updateMouMoaRepository($id);
    public function destroyMouMoaRepository($id);

    /**===========================================================================
     * feature: master data kegiatan 
    /**===========================================================================
     */
    /**
     * master data kegiatan
     */
    public function indexKegiatanRepository();
    public function createKegiatanRepository();
    public function storeKegiatanRepository($request);
    public function editKegiatanRepository($id);
    public function updateKegiatanRepository($id);
    public function destroyKegiatanRepository($id);
}
