<?php

namespace App\Modules\StaffOrDosen\interfaces;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

interface Handler_interfaces
{
    /**
     *  BahanAjar
     */
    public function indexBahanAjar(Request $request): View|RedirectResponse;
    public function createBahanAjar(): View;
    public function storeBahanAjar(Request $request);
    public function editBahanAjar(int $id, Request $request): RedirectResponse|view;
    public function updateBahanAjar(int $id, Request $request): RedirectResponse;
    public function destroyBahanAjar(int $id, Request $request): RedirectResponse;
    /**
     *  Penelitian
     */
    public function indexPenelitian(Request $request): View|RedirectResponse;
    public function createPenelitian(): View;
    public function storePenelitian(Request $request);
    public function editPenelitian(int $id, Request $request): RedirectResponse|view;
    public function updatePenelitian(int $id, Request $request): RedirectResponse;
    public function destroyPenelitian(int $id, Request $request): RedirectResponse;

    /**
     *  Pengabdian
     */
    public function indexPengabdian(Request $request): View|RedirectResponse;
    public function createPengabdian(): View;
    public function storePengabdian(Request $request);
    public function editPengabdian(int $id, Request $request): RedirectResponse|view;
    public function updatePengabdian(int $id, Request $request): RedirectResponse;
    public function destroyPengabdian(int $id, Request $request): RedirectResponse;

    /**
     * file manager
     */
    public function indexFileManager(): View|RedirectResponse;
}
