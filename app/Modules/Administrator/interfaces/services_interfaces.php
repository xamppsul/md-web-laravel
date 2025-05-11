<?php

namespace App\Modules\Administrator\interfaces;

interface Services_interfaces
{
    /**
     * master asset
     */
    public function indexAssetService();
    public function createAssetService();
    public function storeAssetService($request);
    public function editAssetService($id);
    public function updateAssetService($id);
    public function destroyAssetService($id);
}
