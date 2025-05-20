<?php

namespace App\Modules\StaffOrDosen\handler;

use App\Modules\StaffOrDosen\interfaces\Handler_interfaces;
use App\Modules\StaffOrDosen\usecase\Usecase;
use App\Src\Domain\User\BahanAjarDomain;
use App\Src\Domain\User\PenelitianDomain;
use App\Src\Domain\User\PengabdianDomain;
use App\Src\Request\User\BahanAjarRequest;
use App\Src\Request\User\PenelitianRequest;
use App\Src\Request\User\PengabdianRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class Handler extends Usecase implements Handler_interfaces
{

    public function __construct(
        //domain BahanAjar and request
        private BahanAjarDomain $bahanAjarDomain,
        private BahanAjarRequest $bahanAjarRequest,
        //domain penelitian and request
        private PenelitianDomain $penelitianDomain,
        private PenelitianRequest $penelitianRequest,
        //domain penelitian and request
        private PengabdianDomain $pengabdianDomain,
        private PengabdianRequest $pengabdianRequest,
    ) {}
    /**============================================================================
     *  BahanAjar
     * ============================================================================
     */
    /**
     * @method indexBahanAjar
     * @param $request
     * @return View|RedirectResponse
     */
    public function indexBahanAjar(Request $request): View|RedirectResponse
    {
        return $this->indexBahanAjarCase(
            $this->bahanAjarDomain,
            $request,
        );
    }
    /**
     * @method createBahanAjar
     * @return View
     */
    public function createBahanAjar(): View
    {
        return view('');
    }
    /**
     * @method storeBahanAjar
     */
    public function storeBahanAjar(Request $request)
    {
        return $this->storeBahanAjarCase(
            $request,
            $this->bahanAjarDomain,
            $this->bahanAjarRequest,
        );
    }
    /**
     * @method editBahanAjar
     * @param int $id
     * @param $request
     * @return RedirectResponse|view
     */
    public function editBahanAjar(int $id, Request $request): RedirectResponse|view
    {
        return $this->editBahanAjarCase(
            $id,
            $this->bahanAjarDomain,
            $request,
        );
    }
    /**
     * @method updateBahanAjar
     * @param int $id
     * @param $request
     * @return RedirectResponse
     */
    public function updateBahanAjar(int $id, Request $request): RedirectResponse
    {
        return $this->updateBahanAjarCase(
            $id,
            $request,
            $this->bahanAjarDomain,
            $this->bahanAjarRequest,
        );
    }
    /**
     * @method destroyBahanAjar
     * @param int $id
     * @param $request
     * @return RedirectResponse
     */
    public function destroyBahanAjar(int $id, Request $request): RedirectResponse
    {
        return $this->destroyBahanAjarCase(
            $id,
            $request,
            $this->bahanAjarDomain
        );
    }

    /**============================================================================
     *  Penelitian
     * ============================================================================
     */
    /**
     * @method indexPenelitian
     * @param $request
     * @return View|RedirectResponse
     */
    public function indexPenelitian(Request $request): View|RedirectResponse
    {
        return $this->indexPenelitianCase(
            $this->penelitianDomain,
            $request,
        );
    }
    /**
     * @method createPenelitian
     * @return View
     */
    public function createPenelitian(): View
    {
        return view('');
    }
    /**
     * @method storePenelitian
     */
    public function storePenelitian(Request $request)
    {
        return $this->storePenelitianCase(
            $request,
            $this->penelitianDomain,
            $this->penelitianRequest,
        );
    }
    /**
     * @method editPenelitian
     * @param int $id
     * @param $request
     * @return RedirectResponse|view
     */
    public function editPenelitian(int $id, Request $request): RedirectResponse|view
    {
        return $this->editPenelitianCase(
            $id,
            $this->penelitianDomain,
            $request,
        );
    }
    /**
     * @method updatePenelitian
     * @param int $id
     * @param $request
     * @return RedirectResponse
     */
    public function updatePenelitian(int $id, Request $request): RedirectResponse
    {
        return $this->updatePenelitianCase(
            $id,
            $request,
            $this->penelitianDomain,
            $this->penelitianRequest,
        );
    }
    /**
     * @method destroyPenelitian
     * @param int $id
     * @param $request
     * @return RedirectResponse
     */
    public function destroyPenelitian(int $id, Request $request): RedirectResponse
    {
        return $this->destroyPenelitianCase(
            $id,
            $request,
            $this->penelitianDomain
        );
    }


    /**============================================================================
     *  Pengabdian
     * ============================================================================
     */
    /**
     * @method indexPengabdian
     * @param $request
     * @return View|RedirectResponse
     */
    public function indexPengabdian(Request $request): View|RedirectResponse
    {
        return $this->indexPengabdianCase(
            $this->pengabdianDomain,
            $request,
        );
    }
    /**
     * @method createPengabdian
     * @return View
     */
    public function createPengabdian(): View
    {
        return view('');
    }
    /**
     * @method storePengabdian
     */
    public function storePengabdian(Request $request)
    {
        return $this->storePengabdianCase(
            $request,
            $this->pengabdianDomain,
            $this->pengabdianRequest,
        );
    }
    /**
     * @method editPengabdian
     * @param int $id
     * @param $request
     * @return RedirectResponse|view
     */
    public function editPengabdian(int $id, Request $request): RedirectResponse|view
    {
        return $this->editPengabdianCase(
            $id,
            $this->pengabdianDomain,
            $request,
        );
    }
    /**
     * @method updatePengabdian
     * @param int $id
     * @param $request
     * @return RedirectResponse
     */
    public function updatePengabdian(int $id, Request $request): RedirectResponse
    {
        return $this->updatePengabdianCase(
            $id,
            $request,
            $this->pengabdianDomain,
            $this->pengabdianRequest,
        );
    }
    /**
     * @method destroyPengabdian
     * @param int $id
     * @param $request
     * @return RedirectResponse
     */
    public function destroyPengabdian(int $id, Request $request): RedirectResponse
    {
        return $this->destroyPengabdianCase(
            $id,
            $request,
            $this->pengabdianDomain
        );
    }
}
