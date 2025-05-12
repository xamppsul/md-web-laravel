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
    public function indexAssetService($asetDomain): array
    {
        return $this->indexAssetRepository($asetDomain);
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
     * @param $id
     * @param $asetDomain
     * @return array
     */
    public function editAssetService($id, $asetDomain): array
    {
        return $this->editAssetRepository($id, $asetDomain);
    }

    /**
     * @method updateAssetService
     * @param $id
     * @return mixed
     */
    public function updateAssetService($id)
    {
        return $this->updateAssetRepository($id);
    }

    /**
     * @method destroyAssetService
     * @param $id
     * @return mixed
     */
    public function destroyAssetService($id)
    {
        return $this->destroyAssetRepository($id);
    }


    /**======================================================================================================================================================================
     * feature: master data mou moa
    /**======================================================================================================================================================================
     */

    /**
     * @method indexMouMoaService
     * @return mixed
     */
    public function indexMouMoaService()
    {
        return $this->indexMouMoaRepository();
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
     * @return mixed
     */
    public function storeMouMoaService($request)
    {
        return $this->storeMouMoaRepository($request);
    }

    /**
     * @method editMouMoaService
     * @param $id
     * @return mixed
     */
    public function editMouMoaService($id)
    {
        return $this->editMouMoaRepository($id);
    }

    /**
     * @method updateMouMoaService
     * @param $id
     * @return mixed
     */
    public function updateMouMoaService($id)
    {
        return $this->updateMouMoaRepository($id);
    }

    /**
     * @method destroyMouMoaService
     * @param $id
     * @return mixed
     */
    public function destroyMouMoaService($id)
    {
        return $this->destroyMouMoaRepository($id);
    }


    /**======================================================================================================================================================================
     * feature: master data kegiatan
    /**======================================================================================================================================================================
     */

    /**
     * @method indexKegiatanService
     * @return mixed
     */
    public function indexKegiatanService()
    {
        return $this->indexKegiatanRepository();
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
     * @return mixed
     */
    public function storeKegiatanService($request)
    {
        return $this->storeKegiatanRepository($request);
    }

    /**
     * @method editKegiatanService
     * @param $id
     * @return mixed
     */
    public function editKegiatanService($id)
    {
        return $this->editKegiatanRepository($id);
    }

    /**
     * @method updateKegiatanService
     * @param $id
     * @return mixed
     */
    public function updateKegiatanService($id)
    {
        return $this->updateKegiatanRepository($id);
    }

    /**
     * @method destroyKegiatanService
     * @param $id
     * @return mixed
     */
    public function destroyKegiatanService($id)
    {
        return $this->destroyKegiatanRepository($id);
    }
}
