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
     * @param $request
     * @param $asetDomain
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
     * @param $mouMoaDomain
     * @param $request
     * @param $constantAdmin
     * @return RedirectResponse|View
     */
    public function indexMouMoaCase(
        $mouMoaDomain,
        $request,
        $constantAdmin,
    ): RedirectResponse|View {
        try {
            $data = $this->indexMouMoaService($mouMoaDomain, $request);
            return view('Modules.Administrator.MouMoa.index', compact('data', 'constantAdmin'));
        } catch (\Exception $error) {
            $mouMoaDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
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
     * @param $mouMoaDomain
     * @param $mouMoaRequest
     * @return RedirectResponse
     */
    public function storeMouMoaCase(
        $request,
        $mouMoaDomain,
        $mouMoaRequest
    ): RedirectResponse {
        $mouMoaRequest->postRequestData($request);

        DB::beginTransaction();
        try {
            $this->storeMouMoaService($request, $mouMoaDomain);
            DB::commit();
            return redirect()->route('admin.master.MouMoa.index')->with('success', 'Berhasil tambah mou/moa');
        } catch (\Exception $error) {
            DB::rollBack();
            $mouMoaDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('admin.master.MouMoa.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
        }
    }

    /**
     * @method editMouMoaCase
     * @param int $id
     * @param $mouMoaDomain
     * @param $request
     * @param $constantDomain
     * @return RedirectResponse|View
     */
    public function editMouMoaCase(
        int $id,
        $mouMoaDomain,
        $request,
        $constantAdmin,
    ): RedirectResponse|View {
        try {
            $data = $this->editMouMoaService($id, $mouMoaDomain);
            return view('Modules.Administrator.MouMoa.edit', compact('data'));
        } catch (\Exception $error) {
            $mouMoaDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('admin.view.dashboard')->with('error', 'Maaf ada kesalahan sistem,harap dicoba kembali');
        }
    }

    /**
     * @method updateMouMoaCase
     * @param int $id
     * @param $request
     * @param $mouMoaDomain
     * @param $mouMoaRequest
     * @return RedirectResponse
     */
    public function updateMouMoaCase(
        int $id,
        $request,
        $mouMoaDomain,
        $mouMoaRequest,
    ): RedirectResponse {
        $mouMoaRequest->updateRequestData($request);

        DB::beginTransaction();
        try {
            $this->updateMouMoaService($id, $mouMoaDomain, $request);
            DB::commit();
            return redirect()->route('admin.master.MouMoa.index')->with('success', 'Berhasil update mou/moa');
        } catch (\Exception $error) {
            DB::rollBack();
            $mouMoaDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('admin.master.MouMoa.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
        }
    }

    /**
     * @method destroyMouMoaCase
     * @param int $id
     * @param $request
     * @param $MouMoaDomain
     * @return RedirectResponse
     */
    public function destroyMouMoaCase(
        int $id,
        $request,
        $mouMoaDomain,
    ): RedirectResponse {

        DB::beginTransaction();
        try {
            $this->destroyMouMoaService($id, $mouMoaDomain);
            DB::commit();
            return redirect()->route('admin.master.MouMoa.index')->with('success', 'Berhasil delete mou/moa');
        } catch (\Exception $error) {
            DB::rollBack();
            $mouMoaDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
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
     * @param $kegiatanDomain
     * @param $request
     * @param $constantAdmin
     * @return RedirectResponse|View
     */
    public function indexKegiatanCase(
        $kegiatanDomain,
        $request,
        $constantAdmin,
    ): RedirectResponse|View {
        try {
            $data = $this->indexKegiatanService($kegiatanDomain, $request);
            return view('Modules.Administrator.Kegiatan.index', compact('data', 'constantAdmin'));
        } catch (\Exception $error) {
            $kegiatanDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
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
     * @param $kegiatanDomain
     * @param $kegiatanRequest
     * @return RedirectResponse
     */
    public function storeKegiatanCase(
        $request,
        $kegiatanDomain,
        $kegiatanRequest
    ): RedirectResponse {
        $kegiatanRequest->postRequestData($request);

        DB::beginTransaction();
        try {
            $this->storeKegiatanService($request, $kegiatanDomain);
            DB::commit();
            return redirect()->route('admin.master.Kegiatan.index')->with('success', 'Berhasil tambah kegiatan');
        } catch (\Exception $error) {
            DB::rollBack();
            $kegiatanDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('admin.master.Kegiatan.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
        }
    }

    /**
     * @method editKegiatanCase
     * @param int $id
     * @param $kegiatanDomain
     * @param $request
     * @param $constantDomain
     * @return RedirectResponse|View
     */
    public function editKegiatanCase(
        int $id,
        $kegiatanDomain,
        $request,
        $constantAdmin,
    ): RedirectResponse|View {
        try {
            $data = $this->editKegiatanService($id, $kegiatanDomain);
            return view('Modules.Administrator.Kegiatan.edit', compact('data'));
        } catch (\Exception $error) {
            $kegiatanDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('admin.view.dashboard')->with('error', 'Maaf ada kesalahan sistem,harap dicoba kembali');
        }
    }

    /**
     * @method updateKegiatanCase
     * @param int $id
     * @param $request
     * @param $kegiatanDomain
     * @param $kegiatanRequest
     * @return RedirectResponse
     */
    public function updateKegiatanCase(
        int $id,
        $request,
        $kegiatanDomain,
        $kegiatanRequest,
    ): RedirectResponse {
        $kegiatanRequest->updateRequestData($request);

        DB::beginTransaction();
        try {
            $this->updateKegiatanService($id, $kegiatanDomain, $request);
            DB::commit();
            return redirect()->route('admin.master.Kegiatan.index')->with('success', 'Berhasil update kegiatan');
        } catch (\Exception $error) {
            DB::rollBack();
            $kegiatanDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
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
        $kegiatanDomain,
    ): RedirectResponse {

        DB::beginTransaction();
        try {
            $this->destroyKegiatanService($id, $kegiatanDomain);
            DB::commit();
            return redirect()->route('admin.master.Kegiatan.index')->with('success', 'Berhasil delete kegiatan');
        } catch (\Exception $error) {
            DB::rollBack();
            $kegiatanDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('admin.master.Kegiatan.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
        }
    }



    /**
     * =================================================================
     * feature: elfinder
     * =================================================================
     */

    /**
     * @method indexElfinderCase
     * @return RedirectResponse|View
     */

    public function indexElfinderCase(
        $elfinderDomain,
        $request,
    ): RedirectResponse|View {
        try {
            return view('Modules.Administrator.Elfinder.index');
        } catch (\Exception $e) {
            $elfinderDomain->DomainLogInsert($e->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('admin.view.dashboard')->with('error', 'Maaf ada kesalahan sistem,harap dicoba kembali');
        }
    }
}
