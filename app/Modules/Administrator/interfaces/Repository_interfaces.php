<?php

namespace App\Modules\Administrator\interfaces;

interface Repository_interfaces
{
    /**===========================================================================
     * feature: master data aset 
    /**===========================================================================
     */
    public function indexAssetRepository($asetDomain, $request): array;
    public function createAssetRepository();
    public function storeAssetRepository($request, $asetDomain): void;
    public function editAssetRepository(int $id, $asetDomain): array;
    public function updateAssetRepository(int $id, $asetDomain, $request): void;
    public function destroyAssetRepository(int $id, $asetDomain): void;

    /**===========================================================================
     * feature: master data mou moa 
    /**===========================================================================
     */
    public function indexMouMoaRepository($mouMoaDomain, $request): array;
    public function createMouMoaRepository();
    public function storeMouMoaRepository($request, $mouMoaDomain, string $filePendukung): void;
    public function editMouMoaRepository(int $id, $mouMoaDomain): array;
    public function updateMouMoaRepository(int $id, $mouMoaDomain, $request, string $filePendukung): void;
    public function destroyMouMoaRepository(int $id, $mouMoaDomain): void;

    //file upload
    public function doUploadFilePendukung($request, $DB_USER): string;

    /**===========================================================================
     * feature: master data kegiatan 
    /**===========================================================================
     */
    public function indexKegiatanRepository($kegiatanDomain, $request): array;
    public function createKegiatanRepository();
    public function storeKegiatanRepository($request, $kegiatanDomain, string $fileDaftarHadir, string $fileKegiatan): void;
    public function editKegiatanRepository(int $id, $kegiatanDomain): array;
    public function updateKegiatanRepository(int $id, $kegiatanDomain, $request, string $fileDaftarHadir, string $fileKegiatan): void;
    public function destroyKegiatanRepository(int $id, $kegiatanDomain): void;

    /**
     * ============================================================================
     * feature: master data user
     * ============================================================================
     */

    public function indexUserMasterRepository($userMasterDomain, $request): array;
    public function createUserMasterRepository();
    public function storeUserMasterRepository($request, $userMasterDomain): void;
    public function editUserMasterRepository(int $id, $userMasterDomain): array;
    public function updateUserMasterRepository(int $id, $userMasterDomain, $request): void;
    public function destroyUserMasterRepository(int $id, $userMasterDomain): void;

    /**
     * ============================================================================
     * feature: master log
     * ============================================================================
     */

    public function indexLogUserRepository($userLogDomain, $request): array;
}
