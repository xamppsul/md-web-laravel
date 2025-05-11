<?php

namespace App\Modules\Administrator\interfaces;

interface Repository_interfaces
{
    /**
     * master asset
     */
    public function indexAssetRepository();
    public function createAssetRepository();
    public function storeAssetRepository($request);
    public function editAssetRepository($id);
    public function updateAssetRepository($id);
    public function destroyAssetRepository($id);
}
