<?php

namespace App\Modules\Administrator\interfaces;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

interface Handler_interfaces
{
    /**
     * master asset
     */
    public function indexAsset(Request $request): View|RedirectResponse;
    public function createAsset(): View;
    public function storeAsset(Request $request);
    public function editAsset(int $id, Request $request): RedirectResponse|view;
    public function updateAsset(int $id, Request $request): RedirectResponse;
    public function destroyAsset($id, Request $request): RedirectResponse;
    /**
     * master mou_moa
     */
    public function indexMouMoa(): View;
    public function createMouMoa(): View;
    public function storeMouMoa(Request $request);
    public function editMouMoa($id);
    public function updateMouMoa($id);
    public function destroyMouMoa($id);

    /**
     * master kegiatan
     */
    public function indexKegiatan(): View;
    public function createKegiatan(): View;
    public function storeKegiatan(Request $request);
    public function editKegiatan($id);
    public function updateKegiatan($id);
    public function destroyKegiatan($id);
}
