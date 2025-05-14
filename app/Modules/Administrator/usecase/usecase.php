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
            $data = $this->indexAssetService($asetDomain, $request);
            return view('Modules.Administrator.Aset.index', compact('data', 'constantAdmin'));
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
     * @param int $id
     * @param $asetDomain
     * @param $request
     * @param $constantDomain
     * @return RedirectResponse|View
     */
    public function editAssetCase(
        int $id,
        $asetDomain,
        $request,
        $constantAdmin,
    ): RedirectResponse|View {
        try {
            $data = $this->editAssetService($id, $asetDomain);
            return view('Modules.Administrator.Aset.edit', compact('data'));
        } catch (\Exception $error) {
            $asetDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('admin.view.dashboard')->with('error', 'Maaf ada kesalahan sistem,harap dicoba kembali');
        }
    }

    /**
     * @method updateAssetCase
     * @param int $id
     * @param $request
     * @param $asetDomain
     * @param $asetRequest
     * @return RedirectResponse
     */
    public function updateAssetCase(
        int $id,
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
     * @param int $id
     * @return RedirectResponse
     */
    public function destroyAssetCase(
        int $id,
        $request,
        $asetDomain,
    ): RedirectResponse {

        DB::beginTransaction();
        try {
            $this->destroyAssetService($id, $asetDomain);
            DB::commit();
            return redirect()->route('admin.master.Asset.index')->with('success', 'Berhasil delete aset');
        } catch (\Exception $error) {
            DB::rollBack();
            $asetDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('admin.master.Asset.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
        }
    }


    /**
     * =============================================================================================================================================================
     * feature: master data mou moa
     * =============================================================================================================================================================
     */
    /**
     * @method indexMouMoaCase
     * @param $asetDomain
     * @param $request
     * @param $constantAdmin
     * @return RedirectResponse|View
     */
    public function indexMouMoaCase(
        $asetDomain,
        $request,
        $constantAdmin,
    ): RedirectResponse|View {
        try {
            $data = $this->indexMouMoaService($asetDomain, $request);
            return view('Modules.Administrator.MouMoa.index', compact('data', 'constantAdmin'));
        } catch (\Exception $error) {
            $asetDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('admin.view.dashboard')->with('error', 'Maaf ada kesalahan sistem,harap dicoba kembali');
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
     * @param $asetDomain
     * @param $asetRequest
     * @return RedirectResponse
     */
    public function storeMouMoaCase(
        $request,
        $asetDomain,
        $asetRequest
    ): RedirectResponse {
        $asetRequest->postRequestData($request);

        DB::beginTransaction();
        try {
            $this->storeMouMoaService($request, $asetDomain);
            DB::commit();
            return redirect()->route('admin.master.MouMoa.index')->with('success', 'Berhasil tambah aset');
        } catch (\Exception $error) {
            DB::rollBack();
            $asetDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('admin.master.MouMoa.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
        }
    }

    /**
     * @method editMouMoaCase
     * @param int $id
     * @param $asetDomain
     * @param $request
     * @param $constantDomain
     * @return RedirectResponse|View
     */
    public function editMouMoaCase(
        int $id,
        $asetDomain,
        $request,
        $constantAdmin,
    ): RedirectResponse|View {
        try {
            $data = $this->editMouMoaService($id, $asetDomain);
            return view('Modules.Administrator.MouMoa.edit', compact('data'));
        } catch (\Exception $error) {
            $asetDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('admin.view.dashboard')->with('error', 'Maaf ada kesalahan sistem,harap dicoba kembali');
        }
    }

    /**
     * @method updateMouMoaCase
     * @param int $id
     * @param $request
     * @param $asetDomain
     * @param $asetRequest
     * @return RedirectResponse
     */
    public function updateMouMoaCase(
        int $id,
        $request,
        $asetDomain,
        $asetRequest,
    ): RedirectResponse {
        $asetRequest->updateRequestData($request);

        DB::beginTransaction();
        try {
            $this->updateMouMoaService($id, $asetDomain, $request);
            DB::commit();
            return redirect()->route('admin.master.MouMoa.index')->with('success', 'Berhasil update aset');
        } catch (\Exception $error) {
            DB::rollBack();
            $asetDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('admin.master.MouMoa.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
        }
    }

    /**
     * @method destroyMouMoaCase
     * @param int $id
     * @return RedirectResponse
     */
    public function destroyMouMoaCase(
        int $id,
        $request,
        $asetDomain,
    ): RedirectResponse {

        DB::beginTransaction();
        try {
            $this->destroyMouMoaService($id, $asetDomain);
            DB::commit();
            return redirect()->route('admin.master.MouMoa.index')->with('success', 'Berhasil delete aset');
        } catch (\Exception $error) {
            DB::rollBack();
            $asetDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('admin.master.MouMoa.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
        }
    }


    /**
     * =============================================================================================================================================================
     * feature: master data kegiatan
     * =============================================================================================================================================================
     */

    /**
     * @method indexKegiatanCase
     * @param $asetDomain
     * @param $request
     * @param $constantAdmin
     * @return RedirectResponse|View
     */
    public function indexKegiatanCase(
        $asetDomain,
        $request,
        $constantAdmin,
    ): RedirectResponse|View {
        try {
            $data = $this->indexKegiatanService($asetDomain, $request);
            return view('Modules.Administrator.Kegiatan.index', compact('data', 'constantAdmin'));
        } catch (\Exception $error) {
            $asetDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('admin.view.dashboard')->with('error', 'Maaf ada kesalahan sistem,harap dicoba kembali');
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
     * @param $asetDomain
     * @param $asetRequest
     * @return RedirectResponse
     */
    public function storeKegiatanCase(
        $request,
        $asetDomain,
        $asetRequest
    ): RedirectResponse {
        $asetRequest->postRequestData($request);

        DB::beginTransaction();
        try {
            $this->storeKegiatanService($request, $asetDomain);
            DB::commit();
            return redirect()->route('admin.master.Kegiatan.index')->with('success', 'Berhasil tambah kegiatan');
        } catch (\Exception $error) {
            DB::rollBack();
            $asetDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('admin.master.Kegiatan.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
        }
    }

    /**
     * @method editKegiatanCase
     * @param int $id
     * @param $asetDomain
     * @param $request
     * @param $constantDomain
     * @return RedirectResponse|View
     */
    public function editKegiatanCase(
        int $id,
        $asetDomain,
        $request,
        $constantAdmin,
    ): RedirectResponse|View {
        try {
            $data = $this->editKegiatanService($id, $asetDomain);
            return view('Modules.Administrator.Kegiatan.edit', compact('data'));
        } catch (\Exception $error) {
            $asetDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('admin.view.dashboard')->with('error', 'Maaf ada kesalahan sistem,harap dicoba kembali');
        }
    }

    /**
     * @method updateKegiatanCase
     * @param int $id
     * @param $request
     * @param $asetDomain
     * @param $asetRequest
     * @return RedirectResponse
     */
    public function updateKegiatanCase(
        int $id,
        $request,
        $asetDomain,
        $asetRequest,
    ): RedirectResponse {
        $asetRequest->updateRequestData($request);

        DB::beginTransaction();
        try {
            $this->updateKegiatanService($id, $asetDomain, $request);
            DB::commit();
            return redirect()->route('admin.master.Kegiatan.index')->with('success', 'Berhasil update kegiatan');
        } catch (\Exception $error) {
            DB::rollBack();
            $asetDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('admin.master.Kegiatan.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
        }
    }

    /**
     * @method destroyKegiatanCase
     * @param int $id
     * @return RedirectResponse
     */
    public function destroyKegiatanCase(
        int $id,
        $request,
        $asetDomain,
    ): RedirectResponse {

        DB::beginTransaction();
        try {
            $this->destroyKegiatanService($id, $asetDomain);
            DB::commit();
            return redirect()->route('admin.master.Kegiatan.index')->with('success', 'Berhasil delete kegiatan');
        } catch (\Exception $error) {
            DB::rollBack();
            $asetDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('admin.master.Kegiatan.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
        }
    }
}
