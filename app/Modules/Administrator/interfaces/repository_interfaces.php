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
    public function indexMouMoaRepository($mouMoaDomain, $request);
    public function createMouMoaRepository();
    public function storeMouMoaRepository($request, $mouMoaDomain, string $filePendukung): void;
    public function editMouMoaRepository(int $id, $mouMoaDomain): array;
    public function updateMouMoaRepository(int $id, $mouMoaDomain, $request, string $filePendukung): void;
    public function destroyMouMoaRepository(int $id, $mouMoaDomain): void;

    //file upload
    public function doUploadFilePendukung($request): string;

    /**===========================================================================
     * feature: master data kegiatan 
    /**===========================================================================
     */
    public function indexKegiatanRepository($kegiatanDomain, $request);
    public function createKegiatanRepository();
    public function storeKegiatanRepository($request, $kegiatanDomain): void;
    public function editKegiatanRepository(int $id, $kegiatanDomain): array;
    public function updateKegiatanRepository(int $id, $kegiatanDomain, $request): void;
    public function destroyKegiatanRepository(int $id, $kegiatanDomain): void;
}
