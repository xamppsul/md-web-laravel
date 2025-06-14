<?php

namespace App\Modules\StaffOrDosen\handler;

use App\Modules\StaffOrDosen\interfaces\Handler_interfaces;
use App\Modules\StaffOrDosen\usecase\Usecase;
use App\Src\Domain\User\BahanAjarDomain;
use App\Src\Domain\User\ListPublikasiDomain;
use App\Src\Domain\User\PenelitianDomain;
use App\Src\Domain\User\PengabdianDomain;
use App\Src\Domain\User\RiwayatJabatanDomain;
use App\Src\Request\User\BahanAjarRequest;
use App\Src\Request\User\ListPublikasiRequest;
use App\Src\Request\User\PenelitianRequest;
use App\Src\Request\User\PengabdianRequest;
use App\Src\Request\User\RiwayatJabatanRequest;
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
        //domain riwayat jabatan and request
        private RiwayatJabatanDomain $riwayatJabatanDomain,
        private RiwayatJabatanRequest $riwayatJabatanRequest,
        //domain list publikasi and request
        private ListPublikasiDomain $listPublikasiDomain,
        private ListPublikasiRequest $listPublikasiRequest,
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

    /**
     * =============================================================================
     * feature: file manager
     * =============================================================================
     */
    /**
     * @method indexFileManager
     * @return View
     */
    public function indexFileManager(): View|RedirectResponse
    {
        return $this->indexFileManagerCase();
    }


    /**============================================================================
     *  Riwayat Jabatan
     * ============================================================================
     */
    /**
     * @method indexRiwayatJabatan
     * @param $request
     * @return View|RedirectResponse
     */
    public function indexRiwayatJabatan(Request $request): View|RedirectResponse
    {
        return $this->indexRiwayatJabatanCase(
            $this->riwayatJabatanDomain,
            $request,
        );
    }
    /**
     * @method createRiwayatJabatan
     * @return View
     */
    public function createRiwayatJabatan(): View
    {
        return view('');
    }
    /**
     * @method storeRiwayatJabatan
     */
    public function storeRiwayatJabatan(Request $request)
    {
        return $this->storeRiwayatJabatanCase(
            $request,
            $this->riwayatJabatanDomain,
            $this->riwayatJabatanRequest,
        );
    }
    /**
     * @method editRiwayatJabatan
     * @param int $id
     * @param $request
     * @return RedirectResponse|view
     */
    public function editRiwayatJabatan(int $id, Request $request): RedirectResponse|view
    {
        return $this->editRiwayatJabatanCase(
            $id,
            $this->riwayatJabatanDomain,
            $request,
        );
    }
    /**
     * @method updateRiwayatJabatan
     * @param int $id
     * @param $request
     * @return RedirectResponse
     */
    public function updateRiwayatJabatan(int $id, Request $request): RedirectResponse
    {
        return $this->updateRiwayatJabatanCase(
            $id,
            $request,
            $this->riwayatJabatanDomain,
            $this->riwayatJabatanRequest,
        );
    }
    /**
     * @method destroyRiwayatJabatan
     * @param int $id
     * @param $request
     * @return RedirectResponse
     */
    public function destroyRiwayatJabatan(int $id, Request $request): RedirectResponse
    {
        return $this->destroyRiwayatJabatanCase(
            $id,
            $request,
            $this->riwayatJabatanDomain
        );
    }

    /**============================================================================
     *  ListPublikasi
     * ============================================================================
     */
    /**
     * @method indexListPublikasi
     * @param $request
     * @return View|RedirectResponse
     */
    public function indexListPublikasi(Request $request): View|RedirectResponse
    {
        return $this->indexListPublikasiCase(
            $this->listPublikasiDomain,
            $request,
        );
    }
    /**
     * @method createListPublikasi
     * @return View
     */
    public function createListPublikasi(): View
    {
        return view('');
    }
    /**
     * @method storeListPublikasi
     */
    public function storeListPublikasi(Request $request)
    {
        return $this->storeListPublikasiCase(
            $request,
            $this->listPublikasiDomain,
            $this->listPublikasiRequest,
        );
    }
    /**
     * @method editListPublikasi
     * @param int $id
     * @param $request
     * @return RedirectResponse|view
     */
    public function editListPublikasi(int $id, Request $request): RedirectResponse|view
    {
        return $this->editListPublikasiCase(
            $id,
            $this->listPublikasiDomain,
            $request,
        );
    }
    /**
     * @method updateListPublikasi
     * @param int $id
     * @param $request
     * @return RedirectResponse
     */
    public function updateListPublikasi(int $id, Request $request): RedirectResponse
    {
        return $this->updateListPublikasiCase(
            $id,
            $request,
            $this->listPublikasiDomain,
            $this->listPublikasiRequest,
        );
    }
    /**
     * @method destroyListPublikasi
     * @param int $id
     * @param $request
     * @return RedirectResponse
     */
    public function destroyListPublikasi(int $id, Request $request): RedirectResponse
    {
        return $this->destroyListPublikasiCase(
            $id,
            $request,
            $this->listPublikasiDomain
        );
    }
}
