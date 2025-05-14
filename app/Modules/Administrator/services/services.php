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
     * @param $asetDomain
     * @return array
     */
    public function indexMouMoaService($asetDomain, $request): array
    {
        return $this->indexMouMoaRepository($asetDomain, $request);
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
     * @param $asetDomain
     * @return void
     */
    public function storeMouMoaService($request, $asetDomain): void
    {
        $this->storeMouMoaRepository($request, $asetDomain);
    }

    /**
     * @method editMouMoaService
     * @param int $id
     * @param $asetDomain
     * @return array
     */
    public function editMouMoaService(int $id, $asetDomain): array
    {
        return $this->editMouMoaRepository($id, $asetDomain);
    }

    /**
     * @method updateMouMoaService
     * @param int $id
     * @param $asetDomain
     * @param $request
     * @return void
     */
    public function updateMouMoaService(int $id, $asetDomain, $request): void
    {
        $this->updateMouMoaRepository($id, $asetDomain, $request);
    }

    /**
     * @method destroyMouMoaService
     * @param int $id
     * @param $asetDomain
     * @return void
     */
    public function destroyMouMoaService(int $id, $asetDomain): void
    {
        $this->destroyMouMoaRepository($id, $asetDomain);
    }


    /**======================================================================================================================================================================
     * feature: master data kegiatan
    /**======================================================================================================================================================================
     */

    /**
     * @method indexKegiatanService
     * @param $asetDomain
     * @return array
     */
    public function indexKegiatanService($asetDomain, $request): array
    {
        return $this->indexKegiatanRepository($asetDomain, $request);
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
     * @param $asetDomain
     * @return void
     */
    public function storeKegiatanService($request, $asetDomain): void
    {
        $this->storeKegiatanRepository($request, $asetDomain);
    }

    /**
     * @method editKegiatanService
     * @param int $id
     * @param $asetDomain
     * @return array
     */
    public function editKegiatanService(int $id, $asetDomain): array
    {
        return $this->editKegiatanRepository($id, $asetDomain);
    }

    /**
     * @method updateKegiatanService
     * @param int $id
     * @param $asetDomain
     * @param $request
     * @return void
     */
    public function updateKegiatanService(int $id, $asetDomain, $request): void
    {
        $this->updateKegiatanRepository($id, $asetDomain, $request);
    }

    /**
     * @method destroyKegiatanService
     * @param int $id
     * @param $asetDomain
     * @return void
     */
    public function destroyKegiatanService(int $id, $asetDomain): void
    {
        $this->destroyMouMoaRepository($id, $asetDomain);
    }
}
