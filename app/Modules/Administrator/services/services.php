<?php

namespace App\Modules\Administrator\services;

use App\Modules\Administrator\repository\Repository;
use App\Modules\Administrator\interfaces\Services_interfaces;

class Services extends Repository implements Services_interfaces
{

    /**
     * feature: master data asset
     */

    /**
     * @method indexAssetService
     * @return mixed
     */
    public function indexAssetService()
    {
        return $this->indexAssetRepository();
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
     * @return mixed
     */
    public function storeAssetService($request)
    {
        return $this->storeAssetRepository($request);
    }

    /**
     * @method editAssetService
     * @param $id
     * @return mixed
     */
    public function editAssetService($id)
    {
        return $this->editAssetRepository($id);
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
}
