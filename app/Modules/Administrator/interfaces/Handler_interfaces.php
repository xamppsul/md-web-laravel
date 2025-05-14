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
    public function destroyAsset(int $id, Request $request): RedirectResponse;
    /**
     * master mou_moa
     */
    public function indexMouMoa(Request $request): View|RedirectResponse;
    public function createMouMoa(): View;
    public function storeMouMoa(Request $request);
    public function editMouMoa(int $id, Request $request): RedirectResponse|view;
    public function updateMouMoa(int $id, Request $request): RedirectResponse;
    public function destroyMouMoa(int $id, Request $request): RedirectResponse;

    /**
     * master kegiatan
     */
    public function indexKegiatan(Request $request): View|RedirectResponse;
    public function createKegiatan(): View;
    public function storeKegiatan(Request $request);
    public function editKegiatan(int $id, Request $request): RedirectResponse|view;
    public function updateKegiatan(int $id, Request $request): RedirectResponse;
    public function destroyKegiatan(int $id, Request $request): RedirectResponse;

    /**
     * master data user
     */
    public function indexUserMaster(Request $request): View|RedirectResponse;
    public function createUserMaster(): View;
    public function storeUserMaster(Request $request);
    public function editUserMaster(int $id, Request $request): RedirectResponse|view;
    public function updateUserMaster(int $id, Request $request): RedirectResponse;
    public function destroyUserMaster(int $id, Request $request): RedirectResponse;
    /**
     * elfinder
     */

    public function indexElfinder(Request $request): RedirectResponse|View;
}
