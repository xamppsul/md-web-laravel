<?php

namespace App\Modules\UppsOrFakultas\interfaces;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

interface Handler_interfaces
{
    /**
     *  asset
     */
    public function indexAsset(Request $request): View|RedirectResponse;
    public function createAsset(): View;
    public function storeAsset(Request $request);
    public function editAsset(int $id, Request $request): RedirectResponse|view;
    public function updateAsset(int $id, Request $request): RedirectResponse;
    public function destroyAsset(int $id, Request $request): RedirectResponse;
    /**
     *  mou_moa
     */
    public function indexMouMoa(Request $request): View|RedirectResponse;
    public function createMouMoa(): View;
    public function storeMouMoa(Request $request);
    public function editMouMoa(int $id, Request $request): RedirectResponse|view;
    public function updateMouMoa(int $id, Request $request): RedirectResponse;
    public function destroyMouMoa(int $id, Request $request): RedirectResponse;

    /**
     *  kegiatan
     */
    public function indexKegiatan(Request $request): View|RedirectResponse;
    public function createKegiatan(): View;
    public function storeKegiatan(Request $request);
    public function editKegiatan(int $id, Request $request): RedirectResponse|view;
    public function updateKegiatan(int $id, Request $request): RedirectResponse;
    public function destroyKegiatan(int $id, Request $request): RedirectResponse;
}
