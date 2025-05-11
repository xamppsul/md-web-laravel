<?php

namespace App\Modules\Administrator\interfaces;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

interface Handler_interfaces
{
    /**
     * master asset
     */
    public function indexAsset(): View;
    public function createAsset(): View;
    public function storeAsset(Request $request);
    public function editAsset($id);
    public function updateAsset($id);
    public function destroyAsset($id);
}
