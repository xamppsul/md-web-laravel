<?php

namespace App\Modules\UppsOrFakultas\services;

use App\Modules\UppsOrFakultas\repository\Repository;
use App\Modules\UppsOrFakultas\interfaces\Services_interfaces;

class Services extends Repository implements Services_interfaces
{

    /**======================================================================================================================================================================
     * feature: asset
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
     * feature: mou moa
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
     * @return void
     */
    public function storeMouMoaService($request, $mouMoaDomain, $user): void
    {
        $this->storeMouMoaRepository($request, $mouMoaDomain, $this->doUploadFilePendukung($request, $user));
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
     * @return void
     */
    public function updateMouMoaService(int $id, $mouMoaDomain, $request, $user): void
    {
        $this->updateMouMoaRepository($id, $mouMoaDomain, $request, $this->doUploadFilePendukung($request, $user));
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
     * feature: kegiatan
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
    public function storeKegiatanService($request, $kegiatanDomain, $user): void
    {
        $this->storeKegiatanRepository($request, $kegiatanDomain, $this->doUploadFileDaftarHadirKegiatan($request, $user), $this->doUploadFileDokumentasiKegiatan($request, $user));
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
    public function updateKegiatanService(int $id, $kegiatanDomain, $request, $user): void
    {
        $this->updateKegiatanRepository($id, $kegiatanDomain, $request, $this->doUploadFileDaftarHadirKegiatan($request, $user), $this->doUploadFileDokumentasiKegiatan($request, $user));
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
}
