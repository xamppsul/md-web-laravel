<?php

namespace App\Modules\Administrator\handler;

use App\Modules\Administrator\interfaces\Handler_interfaces;
use App\Modules\Administrator\usecase\Usecase;
use App\Src\Domain\Admin\AsetDomain;
use App\Src\Request\Admin\Master\AsetRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class Handler extends Usecase implements Handler_interfaces
{
    /**
     * construct injection
     */

    public function __construct(
        private AsetDomain $asetDomain,
        private AsetRequest $asetRequest,
    ) {}
    /**
     * ==============================================================================================================================
     * feature: master data asset
     * ==============================================================================================================================
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
        return $this->storeAssetCase(
            $request,
            $this->asetDomain,
            $this->asetRequest,
        );
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


    /**
     * ==============================================================================================================================
     * feature: master data mou moa
     * ==============================================================================================================================
     */
    /**
     * @method indexMouMoa
     * @return View
     */
    public function indexMouMoa(): View
    {
        return $this->indexMouMoaCase();
    }

    /**
     * @method createMouMoa
     * @return View
     */
    public function createMouMoa(): View
    {
        return $this->createMouMoaCase();
    }

    /**
     * @method storeMouMoa
     * @return mixed
     */
    public function storeMouMoa(Request $request)
    {
        return $this->storeMouMoaCase($request);
    }

    /**
     * @method editMouMoa
     * @return mixed
     * @param $id

     */
    public function editMouMoa($id)
    {
        return $this->editMouMoaCase($id);
    }

    /**
     * @method updateMouMoa
     * @return mixed
     * @param $id
     */
    public function updateMouMoa($id)
    {
        return $this->updateMouMoaCase($id);
    }

    /**
     * @method destroyMouMoa
     * @return mixed
     * @param $id
     */
    public function destroyMouMoa($id)
    {
        return $this->destroyMouMoaCase($id);
    }


    /**
     * ==============================================================================================================================
     * feature: master data kegiatan
     * ==============================================================================================================================
     */
    /**
     * @method indexKegiatan
     * @return View
     */
    public function indexKegiatan(): View
    {
        return $this->indexKegiatanCase();
    }

    /**
     * @method createKegiatan
     * @return View
     */
    public function createKegiatan(): View
    {
        return $this->createKegiatanCase();
    }

    /**
     * @method storeKegiatan
     * @return mixed
     */
    public function storeKegiatan(Request $request)
    {
        return $this->storeKegiatanCase($request);
    }

    /**
     * @method editKegiatan
     * @return mixed
     * @param $id

     */
    public function editKegiatan($id)
    {
        return $this->editKegiatanCase($id);
    }

    /**
     * @method updateKegiatan
     * @return mixed
     * @param $id
     */
    public function updateKegiatan($id)
    {
        return $this->updateKegiatanCase($id);
    }

    /**
     * @method destroyKegiatan
     * @return mixed
     * @param $id
     */
    public function destroyKegiatan($id)
    {
        return $this->destroyKegiatanCase($id);
    }
}
