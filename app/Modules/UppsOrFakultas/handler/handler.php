<?php

namespace App\Modules\UppsOrFakultas\handler;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Src\Domain\User\AsetDomain;
use Illuminate\Http\RedirectResponse;
use App\Src\Domain\User\MouMoaDomain;
use App\Src\Domain\User\KegiatanDomain;
use App\Src\Constant\User\UserConstant;
use App\Src\Request\User\AsetRequest;
use App\Modules\UppsOrFakultas\usecase\Usecase;
use App\Src\Request\User\MouMoaRequest;
use App\Src\Request\User\KegiatanRequest;
use App\Modules\UppsOrFakultas\interfaces\Handler_interfaces;

class Handler extends Usecase implements Handler_interfaces
{
    /**
     * construct injection
     */

    public function __construct(
        //aset
        private AsetDomain $asetDomain,
        private AsetRequest $asetRequest,
        private UserConstant $constantUser,
        //mou moa
        private MouMoaDomain $mouMoaDomain,
        private MouMoaRequest $mouMoaRequest,
        //kegiatan
        private KegiatanDomain $kegiatanDomain,
        private KegiatanRequest $kegiatanRequest,
    ) {}
    /**
     * ==============================================================================================================================
     * feature: asset
     * ==============================================================================================================================
     */

    /**
     * @method indexAsset
     * @return View|RedirectResponse
     */
    public function indexAsset(Request $request): View|RedirectResponse
    {
        return $this->indexAssetCase(
            $this->asetDomain,
            $request,
            $this->constantUser,
        );
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
     * @param int $id
     * @param $request
     * @return RedirectResponse|view
     */
    public function editAsset(int $id, Request $request): RedirectResponse|view
    {
        return $this->editAssetCase(
            $id,
            $this->asetDomain,
            $request,
            $this->constantUser,
        );
    }

    /**
     * @method updateAsset
     * @param int $id
     * @param $request
     * @return RedirectResponse
     */
    public function updateAsset(int $id, Request $request): RedirectResponse
    {
        return $this->updateAssetCase(
            $id,
            $request,
            $this->asetDomain,
            $this->asetRequest,
        );
    }

    /**
     * @method destroyAsset
     * @param int $id
     * @param $request
     * @return RedirectResponse
     */
    public function destroyAsset(int $id, Request $request): RedirectResponse
    {
        return $this->destroyAssetCase($id, $request, $this->asetDomain);
    }


    /**
     * ==============================================================================================================================
     * feature: mou moa
     * ==============================================================================================================================
     */
    /**
     * @method indexMouMoa
     * @return View|RedirectResponse
     */
    public function indexMouMoa(Request $request): View|RedirectResponse
    {
        return $this->indexMouMoaCase(
            $this->mouMoaDomain,
            $request,
            $this->constantUser,
        );
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
     */
    public function storeMouMoa(Request $request)
    {
        return $this->storeMouMoaCase(
            $request,
            $this->mouMoaDomain,
            $this->mouMoaRequest,
        );
    }

    /**
     * @method editMouMoa
     * @param int $id
     * @param $request
     * @return RedirectResponse|view
     */
    public function editMouMoa(int $id, Request $request): RedirectResponse|view
    {
        return $this->editMouMoaCase(
            $id,
            $this->mouMoaDomain,
            $request,
            $this->constantUser,
        );
    }

    /**
     * @method updateMouMoa
     * @param int $id
     * @param $request
     * @return RedirectResponse
     */
    public function updateMouMoa(int $id, Request $request): RedirectResponse
    {
        return $this->updateMouMoaCase(
            $id,
            $request,
            $this->mouMoaDomain,
            $this->mouMoaRequest,
        );
    }

    /**
     * @method destroyMouMoa
     * @param int $id
     * @param $request
     * @return RedirectResponse
     */
    public function destroyMouMoa(int $id, Request $request): RedirectResponse
    {
        return $this->destroyMouMoaCase($id, $request, $this->mouMoaDomain);
    }


    /**
     * ==============================================================================================================================
     * feature: kegiatan
     * ==============================================================================================================================
     */
    /**
     * @method indexKegiatan
     * @return View|RedirectResponse
     */
    public function indexKegiatan(Request $request): View|RedirectResponse
    {
        return $this->indexKegiatanCase(
            $this->kegiatanDomain,
            $request,
            $this->constantUser,
        );
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
     */
    public function storeKegiatan(Request $request)
    {
        return $this->storeKegiatanCase(
            $request,
            $this->kegiatanDomain,
            $this->kegiatanRequest,
        );
    }

    /**
     * @method editKegiatan
     * @param int $id
     * @param $request
     * @return RedirectResponse|view
     */
    public function editKegiatan(int $id, Request $request): RedirectResponse|view
    {
        return $this->editKegiatanCase(
            $id,
            $this->kegiatanDomain,
            $request,
            $this->constantUser,
        );
    }

    /**
     * @method updateKegiatan
     * @param int $id
     * @param $request
     * @return RedirectResponse
     */
    public function updateKegiatan(int $id, Request $request): RedirectResponse
    {
        return $this->updateKegiatanCase(
            $id,
            $request,
            $this->kegiatanDomain,
            $this->kegiatanRequest,
        );
    }

    /**
     * @method destroyKegiatan
     * @param int $id
     * @param $request
     * @return RedirectResponse
     */
    public function destroyKegiatan(int $id, Request $request): RedirectResponse
    {
        return $this->destroyKegiatanCase($id, $request, $this->kegiatanDomain);
    }
}
