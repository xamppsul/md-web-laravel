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
}
