<?php

namespace App\Modules\Administrator\repository;

use App\Modules\Administrator\interfaces\Repository_interfaces;

class Repository implements Repository_interfaces
{
    /**
     * feture: master data asset
     */
    public function indexAssetRepository()
    {
        return 'index asset repository';
    }
    public function createAssetRepository()
    {
        return 'create asset repository';
    }
    public function storeAssetRepository($request)
    {
        return 'store asset repository';
    }
    public function editAssetRepository($id)
    {
        return 'edit asset repository';
    }
    public function updateAssetRepository($id)
    {
        return 'update asset repository';
    }
    public function destroyAssetRepository($id)
    {
        return 'destroy asset repository';
    }
}
