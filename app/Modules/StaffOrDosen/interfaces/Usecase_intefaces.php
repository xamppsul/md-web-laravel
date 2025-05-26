<?php

namespace App\Modules\StaffOrDosen\interfaces;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

interface Usecase_intefaces
{
    /**
     * BahanAjar
     */
    public function indexBahanAjarCase(
        $bahanAjarDomain,
        $request,
    ): RedirectResponse|View;
    public function createBahanAjarCase(): View;
    public function storeBahanAjarCase(
        $request,
        $bahanAjarDomain,
        $bahanAjarRequest
    ): RedirectResponse;
    public function editBahanAjarCase(
        int $id,
        $bahanAjarDomain,
        $request,
    ): RedirectResponse|View;
    public function updateBahanAjarCase(
        int $id,
        $request,
        $bahanAjarDomain,
        $bahanAjarRequest,
    ): RedirectResponse;
    public function destroyBahanAjarCase(
        int $id,
        $request,
        $bahanAjarDomain,
    ): RedirectResponse;
    /**
     * Penelitian
     */
    public function indexPenelitianCase(
        $penelitianDomain,
        $request,
    ): RedirectResponse|View;
    public function createPenelitianCase(): View;
    public function storePenelitianCase(
        $request,
        $penelitianDomain,
        $PenelitianRequest
    ): RedirectResponse;
    public function editPenelitianCase(
        int $id,
        $penelitianDomain,
        $request,
    ): RedirectResponse|View;
    public function updatePenelitianCase(
        int $id,
        $request,
        $penelitianDomain,
        $PenelitianRequest,
    ): RedirectResponse;
    public function destroyPenelitianCase(
        int $id,
        $request,
        $penelitianDomain,
    ): RedirectResponse;
    /**
     * Pengabdian
     */
    public function indexPengabdianCase(
        $pengabdianDomain,
        $request,
    ): RedirectResponse|View;
    public function createPengabdianCase(): View;
    public function storePengabdianCase(
        $request,
        $pengabdianDomain,
        $pengabdianRequest
    ): RedirectResponse;
    public function editPengabdianCase(
        int $id,
        $pengabdianDomain,
        $request,
    ): RedirectResponse|View;
    public function updatePengabdianCase(
        int $id,
        $request,
        $pengabdianDomain,
        $pengabdianRequest,
    ): RedirectResponse;
    public function destroyPengabdianCase(
        int $id,
        $request,
        $pengabdianDomain,
    ): RedirectResponse;

    /**
     * fileManager
     */
    public function indexFileManagerCase(): View|RedirectResponse;


    /**
     * Riwayat Jabatan
     */
    public function indexRiwayatJabatanCase(
        $riwayatJabatanDomain,
        $request,
    ): RedirectResponse|View;
    public function createRiwayatJabatanCase(): View;
    public function storeRiwayatJabatanCase(
        $request,
        $riwayatJabatanDomain,
        $riwayatJabatanRequest
    ): RedirectResponse;
    public function editRiwayatJabatanCase(
        int $id,
        $riwayatJabatanDomain,
        $request,
    ): RedirectResponse|View;
    public function updateRiwayatJabatanCase(
        int $id,
        $request,
        $riwayatJabatanDomain,
        $riwayatJabatanRequest,
    ): RedirectResponse;
    public function destroyRiwayatJabatanCase(
        int $id,
        $request,
        $riwayatJabatanDomain,
    ): RedirectResponse;

    /**
     * ListPublikasi
     */
    public function indexListPublikasiCase(
        $listPublikasiDomain,
        $request,
    ): RedirectResponse|View;
    public function createListPublikasiCase(): View;
    public function storeListPublikasiCase(
        $request,
        $listPublikasiDomain,
        $listPublikasiRequest
    ): RedirectResponse;
    public function editListPublikasiCase(
        int $id,
        $listPublikasiDomain,
        $request,
    ): RedirectResponse|View;
    public function updateListPublikasiCase(
        int $id,
        $request,
        $listPublikasiDomain,
        $listPublikasiRequest,
    ): RedirectResponse;
    public function destroyListPublikasiCase(
        int $id,
        $request,
        $listPublikasiDomain,
    ): RedirectResponse;
}
