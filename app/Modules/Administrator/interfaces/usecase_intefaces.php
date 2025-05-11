<?php

namespace App\Modules\Administrator\interfaces;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

interface Usecase_intefaces
{
    /**
     * master asset
     */
    public function indexAssetCase(): RedirectResponse|View;
    public function createAssetCase(): View;
    public function storeAssetCase($request);
    public function editAssetCase($id);
    public function updateAssetCase($id);
    public function destroyAssetCase($id);
}
