<?php

namespace App\Modules\Administrator\handler;

use App\Modules\Administrator\interfaces\Handler_interfaces;
use App\Modules\Administrator\usecase\Usecase;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class Handler extends Usecase implements Handler_interfaces
{
    /**
     * feature: master data asset
     */

    /**
     * @method indexAsset
     * @return View
     */
    public function indexAsset(): View
    {
        return $this->indexAssetCase();
    }

    /**
     * @method createAsset
     * @return View
     */
    public function createAsset(): View
    {
        return $this->createAssetCase();
    }

    /**
     * @method storeAsset
     */
    public function storeAsset(Request $request)
    {
        return $this->storeAssetCase($request);
    }

    /**
     * @method editAsset
     * @param $id
     */
    public function editAsset($id)
    {
        return $this->editAssetCase($id);
    }

    /**
     * @method updateAsset
     * @param $id
     */
    public function updateAsset($id)
    {
        return $this->updateAssetCase($id);
    }

    /**
     * @method destroyAsset
     * @param $id
     */
    public function destroyAsset($id)
    {
        return $this->destroyAssetCase($id);
    }
}
