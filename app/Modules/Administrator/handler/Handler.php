<?php

namespace App\Modules\Administrator\handler;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Src\Domain\Admin\AsetDomain;
use Illuminate\Http\RedirectResponse;
use App\Src\Domain\Admin\MouMoaDomain;
use App\Src\Domain\Admin\LogUserDomain;
use App\Src\Domain\Admin\ElfinderDomain;
use App\Src\Domain\Admin\KegiatanDomain;
use App\Src\Constant\Admin\AdminConstant;
use App\Src\Domain\Admin\UserMasterDomain;
use App\Src\Request\Admin\Master\AsetRequest;
use App\Modules\Administrator\usecase\Usecase;
use App\Src\Request\Admin\Master\MouMoaRequest;
use App\Src\Request\Admin\Master\KegiatanRequest;
use App\Src\Request\Admin\Master\UserMasterRequest;
use App\Modules\Administrator\interfaces\Handler_interfaces;
use Illuminate\Support\Facades\DB;

class Handler extends Usecase implements Handler_interfaces
{
    /**
     * construct injection
     */
    private $DB;
    public function __construct(
        //aset
        private AsetDomain $asetDomain,
        private AsetRequest $asetRequest,
        private AdminConstant $constantAdmin,
        //mou moa
        private MouMoaDomain $mouMoaDomain,
        private MouMoaRequest $mouMoaRequest,
        //kegiatan
        private KegiatanDomain $kegiatanDomain,
        private KegiatanRequest $kegiatanRequest,
        //user
        private UserMasterDomain $userMasterDomain,
        private UserMasterRequest $userMasterRequest,
        //elfinder
        private ElfinderDomain $elfinderDomain,
        //log
        private LogUserDomain $logUserDomain,
    ) {
        $this->DB = DB::table('users');
    }
    /**
     * ==============================================================================================================================
     * feature: master data asset
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
            $this->constantAdmin,
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
            $this->constantAdmin,
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
     * feature: master data mou moa
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
            $this->constantAdmin,
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
            $this->DB->where([['roles_id', '=', 3], ['id', '=', $request->users_id]])->first(),
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
            $this->constantAdmin,
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
            $this->DB->where([['roles_id', '=', 3], ['id', '=', $request->users_id]])->first(),
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
     * feature: master data kegiatan
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
            $this->constantAdmin,
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
            $this->DB->where([['roles_id', '=', 3], ['id', '=', $request->users_id]])->first(),
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
            $this->constantAdmin,
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
            $this->DB->where([['roles_id', '=', 3], ['id', '=', $request->users_id]])->first(),
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

    /**
     * =======================================================================
     * feature: master data user
     * =======================================================================
     */
    /**
     * @method indexUserMaster
     * @return View|RedirectResponse
     */
    public function indexUserMaster(Request $request): View|RedirectResponse
    {
        return $this->indexUserMasterCase(
            $this->userMasterDomain,
            $request,
            $this->constantAdmin,
        );
    }

    /**
     * @method createUserMaster
     * @return View
     */
    public function createUserMaster(): View
    {
        return $this->createUserMasterCase();
    }

    /**
     * @method storeUserMaster
     */
    public function storeUserMaster(Request $request)
    {
        return $this->storeUserMasterCase(
            $request,
            $this->userMasterDomain,
            $this->userMasterRequest,
        );
    }

    /**
     * @method editUserMaster
     * @param int $id
     * @param $request
     * @return RedirectResponse|view
     */
    public function editUserMaster(int $id, Request $request): RedirectResponse|view
    {
        return $this->editUserMasterCase(
            $id,
            $this->userMasterDomain,
            $request,
            $this->constantAdmin,
        );
    }

    /**
     * @method updateUserMaster
     * @param int $id
     * @param $request
     * @return RedirectResponse
     */
    public function updateUserMaster(int $id, Request $request): RedirectResponse
    {
        return $this->updateUserMasterCase(
            $id,
            $request,
            $this->userMasterDomain,
            $this->userMasterRequest,
        );
    }

    /**
     * @method destroyUserMaster
     * @param int $id
     * @param $request
     * @return RedirectResponse
     */
    public function destroyUserMaster(int $id, Request $request): RedirectResponse
    {
        return $this->destroyUserMasterCase(
            $id,
            $request,
            $this->userMasterDomain
        );
    }

    /**====================================================
     * master log
     * ====================================================
     */
    /**
     * @method indexLogUser
     * @param $request
     * @return View|RedirectResponse
     */
    public function indexLogUser(Request $request): View|RedirectResponse
    {
        return $this->indexLogUserCase(
            $this->logUserDomain,
            $request,
        );
    }


    /**
     * =================================================================
     * feature: elfinder
     * =================================================================
     */

    /**
     * @method indexElfinder
     * @param $request
     * @return RedirectResponse|View
     */
    public function indexElfinder(Request $request): RedirectResponse|View
    {
        return $this->indexElfinderCase(
            $this->elfinderDomain,
            $request,
        );
    }
}
