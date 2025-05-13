<?php

namespace App\Modules\Administrator\usecase;

use App\Modules\Administrator\interfaces\Usecase_intefaces;
use App\Modules\Administrator\services\Services;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class Usecase extends Services implements Usecase_intefaces
{
    /**
     * =============================================================================================================================================================
     * feature: master data asset
     * =============================================================================================================================================================
     */

    /**
     * @method indexAssetCase
     * @param $asetDomain
     * @param $request
     * @param $constantAdmin
     * @return RedirectResponse|View
     */
    public function indexAssetCase(
        $asetDomain,
        $request,
        $constantAdmin,
    ): RedirectResponse|View {
        try {
            $data = $this->indexAssetService($asetDomain);
            return view('Modules.Administrator.Asset.index', compact('data', 'constantAdmin'));
        } catch (\Exception $error) {
            $asetDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('admin.view.dashboard')->with('error', 'Maaf ada kesalahan sistem,harap dicoba kembali');
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
     * @param $asetDomain
     * @param $asetRequest
     * @return RedirectResponse
     */
    public function storeAssetCase(
        $request,
        $asetDomain,
        $asetRequest
    ): RedirectResponse {
        $asetRequest->postRequestData($request);

        DB::beginTransaction();
        try {
            $this->storeAssetService($request, $asetDomain);
            DB::commit();
            return redirect()->route('admin.master.Asset.index')->with('success', 'Berhasil tambah aset');
        } catch (\Exception $error) {
            DB::rollBack();
            $asetDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('admin.master.Asset.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
        }
    }

    /**
     * @method editAssetCase
     * @param $id
     * @param $asetDomain
     * @param $request
     * @param $constantDomain
     * @return RedirectResponse|View
     */
    public function editAssetCase(
        $id,
        $asetDomain,
        $request,
        $constantAdmin,
    ): RedirectResponse|View {
        try {
            $data = $this->editAssetService($id, $asetDomain);
            return view('Modules.Administrator.Asset.edit', compact('data'));
        } catch (\Exception $error) {
            $asetDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('admin.view.dashboard')->with('error', 'Maaf ada kesalahan sistem,harap dicoba kembali');
        }
    }

    /**
     * @method updateAssetCase
     * @param $id
     * @param $request
     * @param $asetDomain
     * @param $asetRequest
     * @return RedirectResponse
     */
    public function updateAssetCase(
        $id,
        $request,
        $asetDomain,
        $asetRequest,
    ): RedirectResponse {
        $asetRequest->updateRequestData($request);

        DB::beginTransaction();
        try {
            $this->updateAssetService($id, $asetDomain, $request);
            DB::commit();
            return redirect()->route('admin.master.Asset.index')->with('success', 'Berhasil update aset');
        } catch (\Exception $error) {
            DB::rollBack();
            $asetDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('admin.master.Asset.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
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


    /**
     * =============================================================================================================================================================
     * feature: master data mou moa
     * =============================================================================================================================================================
     */

    /**
     * @method indexMouMoaCase
     * @return RedirectResponse|View
     */
    public function indexMouMoaCase(): RedirectResponse|View
    {
        try {
            $data = $this->indexMouMoaService();
            return view('Modules.Administrator.MouMoa.index', compact('data'));
        } catch (\Exception $error) {
            return redirect()->back()->with('error', $error->getMessage());
        }
    }

    /**
     * @method createMouMoaCase
     * @return View
     */
    public function createMouMoaCase(): View
    {
        return view('');
    }

    /**
     * @method storeMouMoaCase
     * @param $request
     * @return mixed
     */
    public function storeMouMoaCase($request)
    {
        try {
            return $this->storeMouMoaService($request);
        } catch (\Exception $error) {
        }
    }

    /**
     * @method editMouMoaCase
     * @param $id
     * @return mixed
     */
    public function editMouMoaCase($id)
    {
        try {
            return $this->editMouMoaService($id);
        } catch (\Exception $error) {
        }
    }

    /**
     * @method updateMouMoaCase
     * @param $id
     * @return mixed
     */
    public function updateMouMoaCase($id)
    {
        try {
            return $this->updateMouMoaService($id);
        } catch (\Exception $error) {
        }
    }

    /**
     * @method destroyMouMoaCase
     * @param $id
     * @return mixed
     */
    public function destroyMouMoaCase($id)
    {
        try {
            return $this->destroyMouMoaService($id);
        } catch (\Exception $error) {
        }
    }

    /**
     * =============================================================================================================================================================
     * feature: master data kegiatan
     * =============================================================================================================================================================
     */

    /**
     * @method indexKegiatanCase
     * @return RedirectResponse|View
     */
    public function indexKegiatanCase(): RedirectResponse|View
    {
        try {
            $data = $this->indexKegiatanService();
            return view('Modules.Administrator.Kegiatan.index', compact('data'));
        } catch (\Exception $error) {
            return redirect()->back()->with('error', $error->getMessage());
        }
    }

    /**
     * @method createKegiatanCase
     * @return View
     */
    public function createKegiatanCase(): View
    {
        return view('');
    }

    /**
     * @method storeKegiatanCase
     * @param $request
     * @return mixed
     */
    public function storeKegiatanCase($request)
    {
        try {
            return $this->storeKegiatanService($request);
        } catch (\Exception $error) {
        }
    }

    /**
     * @method editKegiatanCase
     * @param $id
     * @return mixed
     */
    public function editKegiatanCase($id)
    {
        try {
            return $this->editKegiatanService($id);
        } catch (\Exception $error) {
        }
    }

    /**
     * @method updateKegiatanCase
     * @param $id
     * @return mixed
     */
    public function updateKegiatanCase($id)
    {
        try {
            return $this->updateKegiatanService($id);
        } catch (\Exception $error) {
        }
    }

    /**
     * @method destroyKegiatanCase
     * @param $id
     * @return mixed
     */
    public function destroyKegiatanCase($id)
    {
        try {
            return $this->destroyKegiatanService($id);
        } catch (\Exception $error) {
        }
    }
}
