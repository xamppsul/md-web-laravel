<?php

namespace App\Modules\Administrator\usecase;

use App\Modules\Administrator\interfaces\Usecase_intefaces;
use App\Modules\Administrator\services\Services;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class Usecase extends Services implements Usecase_intefaces
{
    /**
     * feature: master data asset
     */

    /**
     * @method indexAssetCase
     * @return RedirectResponse|View
     */
    public function indexAssetCase(): RedirectResponse|View
    {
        try {
            $data = $this->indexAssetService();
            return view('Modules.Administrator.Mou_moa.index', compact('data'));
        } catch (\Exception $error) {
            return redirect()->back()->with('error', $error->getMessage());
        }
    }

    /**
     * @method createAssetCase
     * @return View
     */
    public function createAssetCase(): View
    {
        return view('');
    }

    /**
     * @method storeAssetCase
     * @param $request
     * @return mixed
     */
    public function storeAssetCase($request)
    {
        try {
            return $this->storeAssetService($request);
        } catch (\Exception $error) {
        }
    }

    /**
     * @method editAssetCase
     * @param $id
     * @return mixed
     */
    public function editAssetCase($id)
    {
        try {
            return $this->editAssetService($id);
        } catch (\Exception $error) {
        }
    }

    /**
     * @method updateAssetCase
     * @param $id
     * @return mixed
     */
    public function updateAssetCase($id)
    {
        try {
            return $this->updateAssetService($id);
        } catch (\Exception $error) {
        }
    }

    /**
     * @method destroyAssetCase
     * @param $id
     * @return mixed
     */
    public function destroyAssetCase($id)
    {
        try {
            return $this->destroyAssetService($id);
        } catch (\Exception $error) {
        }
    }
}
