<?php

namespace App\Modules\Administrator\services;

use App\Modules\Administrator\repository\Repository;
use App\Modules\Administrator\interfaces\Services_interfaces;

class Services extends Repository implements Services_interfaces
{

    /**======================================================================================================================================================================
     * feature: master data asset
    /**======================================================================================================================================================================
     */

    /**
     * @method indexAssetService
     * @param $asetDomain
     * @return array
     */
    public function indexAssetService($asetDomain, $request): array
    {
        return $this->indexAssetRepository($asetDomain, $request);
    }

    /**
     * @method createAssetService
     * @return mixed
     */
    public function createAssetService()
    {
        return $this->createAssetRepository();
    }

    /**
     * @method storeAssetService
     * @param $request
     * @param $asetDomain
     * @return void
     */
    public function storeAssetService($request, $asetDomain): void
    {
        $this->storeAssetRepository($request, $asetDomain);
    }

    /**
     * @method editAssetService
     * @param int $id
     * @param $asetDomain
     * @return array
     */
    public function editAssetService(int $id, $asetDomain): array
    {
        return $this->editAssetRepository($id, $asetDomain);
    }

    /**
     * @method updateAssetService
     * @param int $id
     * @param $asetDomain
     * @param $request
     * @return void
     */
    public function updateAssetService(int $id, $asetDomain, $request): void
    {
        $this->updateAssetRepository($id, $asetDomain, $request);
    }

    /**
     * @method destroyAssetService
     * @param int $id
     * @param $asetDomain
     * @return void
     */
    public function destroyAssetService(int $id, $asetDomain): void
    {
        $this->destroyAssetRepository($id, $asetDomain);
    }


    /**======================================================================================================================================================================
     * feature: master data mou moa
    /**======================================================================================================================================================================
     */

    /**
     * @method indexMouMoaService
     * @param $mouMoaDomain
     * @param $request
     * @return array
     */
    public function indexMouMoaService($mouMoaDomain, $request): array
    {
        return $this->indexMouMoaRepository($mouMoaDomain, $request);
    }

    /**
     * @method createMouMoaService
     * @return mixed
     */
    public function createMouMoaService()
    {
        return $this->createMouMoaRepository();
    }

    /**
     * @method storeMouMoaService
     * @param $request
     * @param $mouMoaDomain
     * @param $DB_USER
     * @return void
     */
    public function storeMouMoaService($request, $mouMoaDomain, $DB_USER): void
    {
        $this->storeMouMoaRepository($request, $mouMoaDomain, $this->doUploadFilePendukung($request, $DB_USER));
    }

    /**
     * @method editMouMoaService
     * @param int $id
     * @param $mouMoaDomain
     * @return array
     */
    public function editMouMoaService(int $id, $mouMoaDomain): array
    {
        return $this->editMouMoaRepository($id, $mouMoaDomain);
    }

    /**
     * @method updateMouMoaService
     * @param int $id
     * @param $mouMoaDomain
     * @param $request
     * @param $DB_USER
     * @return void
     */
    public function updateMouMoaService(int $id, $mouMoaDomain, $request, $DB_USER): void
    {
        $this->updateMouMoaRepository($id, $mouMoaDomain, $request, $this->doUploadFilePendukung($request, $DB_USER));
    }

    /**
     * @method destroyMouMoaService
     * @param int $id
     * @param $mouMoaDomain
     * @return void
     */
    public function destroyMouMoaService(int $id, $mouMoaDomain): void
    {
        $this->destroyMouMoaRepository($id, $mouMoaDomain);
    }


    /**======================================================================================================================================================================
     * feature: master data kegiatan
    /**======================================================================================================================================================================
     */

    /**
     * @method indexKegiatanService
     * @param $kegiatanDomain
     * @param $request
     * @return array
     */
    public function indexKegiatanService($kegiatanDomain, $request): array
    {
        return $this->indexKegiatanRepository($kegiatanDomain, $request);
    }

    /**
     * @method createKegiatanService
     * @return mixed
     */
    public function createKegiatanService()
    {
        return $this->createKegiatanRepository();
    }

    /**
     * @method storeKegiatanService
     * @param $request
     * @param $kegiatanDomain
     * @param $fileDaftarHadir
     * @param $fileKegiatan
     * @return void
     */
    public function storeKegiatanService($request, $kegiatanDomain, $DB_USER): void
    {
        $this->storeKegiatanRepository($request, $kegiatanDomain, $this->doUploadFileDaftarHadirKegiatan($request, $DB_USER), $this->doUploadFileDokumentasiKegiatan($request, $DB_USER));
    }

    /**
     * @method editKegiatanService
     * @param int $id
     * @param $kegiatanDomain
     * @return array
     */
    public function editKegiatanService(int $id, $kegiatanDomain): array
    {
        return $this->editKegiatanRepository($id, $kegiatanDomain);
    }

    /**
     * @method updateKegiatanService
     * @param int $id
     * @param $kegiatanDomain
     * @param $request
     * @return void
     */
    public function updateKegiatanService(int $id, $kegiatanDomain, $request, $DB_USER): void
    {
        $this->updateKegiatanRepository($id, $kegiatanDomain, $request, $this->doUploadFileDaftarHadirKegiatan($request, $DB_USER), $this->doUploadFileDokumentasiKegiatan($request, $DB_USER));
    }

    /**
     * @method destroyKegiatanService
     * @param int $id
     * @param $kegiatanDomain
     * @return void
     */
    public function destroyKegiatanService(int $id, $kegiatanDomain): void
    {
        $this->destroyKegiatanRepository($id, $kegiatanDomain);
    }


    /**======================================================================================================================================================================
     * feature: master data user
    /**======================================================================================================================================================================
     */

    /**
     * @method indexUserMasterService
     * @param $userMasterDomain
     * @param $request
     * @return array
     */
    public function indexUserMasterService($userMasterDomain, $request): array
    {
        return $this->indexUserMasterRepository($userMasterDomain, $request);
    }

    /**
     * @method createUserMasterService
     * @return mixed
     */
    public function createUserMasterService()
    {
        return $this->createUserMasterRepository();
    }

    /**
     * @method storeUserMasterService
     * @param $request
     * @param $userMasterDomain
     * @return void
     */
    public function storeUserMasterService($request, $userMasterDomain): void
    {
        $this->storeUserMasterRepository($request, $userMasterDomain);
    }

    /**
     * @method editUserMasterService
     * @param int $id
     * @param $userMasterDomain
     * @return array
     */
    public function editUserMasterService(int $id, $userMasterDomain): array
    {
        return $this->editUserMasterRepository($id, $userMasterDomain);
    }

    /**
     * @method updateUserMasterService
     * @param int $id
     * @param $userMasterDomain
     * @param $request
     * @return void
     */
    public function updateUserMasterService(int $id, $userMasterDomain, $request): void
    {
        $this->updateUserMasterRepository($id, $userMasterDomain, $request);
    }

    /**
     * @method destroyUserMasterService
     * @param int $id
     * @param $userMasterDomain
     * @return void
     */
    public function destroyUserMasterService(int $id, $userMasterDomain): void
    {
        $this->destroyUserMasterRepository($id, $userMasterDomain);
    }


    /**======================================================================================================================================================================
     * feature: master data log
    /**======================================================================================================================================================================
     */

    /**
     * @method indexLogUserService
     * @param $logUserDomain
     * @param $request
     * @return array
     */
    public function indexLogUserService($logUserDomain, $request): array
    {
        return $this->indexLogUserRepository($logUserDomain, $request);
    }
}
