<?php

namespace App\Modules\UppsOrFakultas\usecase;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Modules\UppsOrFakultas\services\Services;
use App\Modules\UppsOrFakultas\interfaces\Usecase_intefaces;

class Usecase extends Services implements Usecase_intefaces
{
    /**
     * =============================================================================================================================================================
     * feature: asset
     * =============================================================================================================================================================
     */

    /**
     * @method indexAssetCase
     * @param $asetDomain
     * @param $request
     * @param $constantUser
     * @return RedirectResponse|View
     */
    public function indexAssetCase(
        $asetDomain,
        $request,
        $constantUser,
    ): RedirectResponse|View {
        try {
            $data = $this->indexAssetService($asetDomain, $request);
            return view('Modules.Users.Aset.index', compact('data', 'constantUser'));
        } catch (\Exception $error) {
            $asetDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('user.view.dashboard')->with('error', 'Maaf ada kesalahan sistem,harap dicoba kembali');
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
            return redirect()->route('uppsfaculty.Asset.index')->with('success', 'Berhasil tambah aset');
        } catch (\Exception $error) {
            DB::rollBack();
            $asetDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('uppsfaculty.Asset.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
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
        $constantUser,
    ): RedirectResponse|View {
        try {
            $data = $this->editAssetService($id, $asetDomain);
            return view('Modules.Users.Aset.edit', compact('data'));
        } catch (\Exception $error) {
            $asetDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('user.view.dashboard')->with('error', 'Maaf ada kesalahan sistem,harap dicoba kembali');
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
            return redirect()->route('uppsfaculty.Asset.index')->with('success', 'Berhasil update aset');
        } catch (\Exception $error) {
            DB::rollBack();
            $asetDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('uppsfaculty.Asset.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
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
            return redirect()->route('uppsfaculty.Asset.index')->with('success', 'Berhasil delete aset');
        } catch (\Exception $error) {
            DB::rollBack();
            $asetDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('uppsfaculty.Asset.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
        }
    }


    /**
     * =============================================================================================================================================================
     * feature: mou moa
     * =============================================================================================================================================================
     */
    /**
     * @method indexMouMoaCase
     * @param $mouMoaDomain
     * @param $request
     * @param $constantUser
     * @return RedirectResponse|View
     */
    public function indexMouMoaCase(
        $mouMoaDomain,
        $request,
        $constantUser,
    ): RedirectResponse|View {
        try {
            $data = $this->indexMouMoaService($mouMoaDomain, $request);
            return view('Modules.Users.MouMoa.index', compact('data', 'constantUser'));
        } catch (\Exception $error) {
            $mouMoaDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('user.view.dashboard')->with('error', 'Maaf ada kesalahan sistem,harap dicoba kembali');
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
            $this->storeMouMoaService($request, $mouMoaDomain, Auth::guard('user')->user());
            DB::commit();
            return redirect()->route('uppsfaculty.MouMoa.index')->with('success', 'Berhasil tambah mou/moa');
        } catch (\Exception $error) {
            DB::rollBack();
            $mouMoaDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('uppsfaculty.MouMoa.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
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
        $constantUser,
    ): RedirectResponse|View {
        try {
            $data = $this->editMouMoaService($id, $mouMoaDomain);
            return view('Modules.Users.MouMoa.edit', compact('data'));
        } catch (\Exception $error) {
            $mouMoaDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('user.view.dashboard')->with('error', 'Maaf ada kesalahan sistem,harap dicoba kembali');
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
            $this->updateMouMoaService($id, $mouMoaDomain, $request, Auth::guard('user')->user());
            DB::commit();
            return redirect()->route('uppsfaculty.MouMoa.index')->with('success', 'Berhasil update mou/moa');
        } catch (\Exception $error) {
            DB::rollBack();
            $mouMoaDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('uppsfaculty.MouMoa.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
        }
    }

    /**
     * @method destroyMouMoaCase
     * @param int $id
     * @param $request
     * @param $mouMoaDomain
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
            return redirect()->route('uppsfaculty.MouMoa.index')->with('success', 'Berhasil delete mou/moa');
        } catch (\Exception $error) {
            DB::rollBack();
            $mouMoaDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('uppsfaculty.MouMoa.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
        }
    }


    /**
     * =============================================================================================================================================================
     * feature: kegiatan
     * =============================================================================================================================================================
     */

    /**
     * @method indexKegiatanCase
     * @param $kegiatanDomain
     * @param $request
     * @param $constantUser
     * @return RedirectResponse|View
     */
    public function indexKegiatanCase(
        $kegiatanDomain,
        $request,
        $constantUser,
    ): RedirectResponse|View {
        try {
            $data = $this->indexKegiatanService($kegiatanDomain, $request);
            return view('Modules.Users.Kegiatan.index', compact('data', 'constantUser'));
        } catch (\Exception $error) {
            $kegiatanDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('user.view.dashboard')->with('error', 'Maaf ada kesalahan sistem,harap dicoba kembali');
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
            $this->storeKegiatanService($request, $kegiatanDomain, Auth::guard('user')->user());
            DB::commit();
            return redirect()->route('uppsfaculty.Kegiatan.index')->with('success', 'Berhasil tambah kegiatan');
        } catch (\Exception $error) {
            DB::rollBack();
            $kegiatanDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('uppsfaculty.Kegiatan.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
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
        $constantUser,
    ): RedirectResponse|View {
        try {
            $data = $this->editKegiatanService($id, $kegiatanDomain);
            return view('Modules.Users.Kegiatan.edit', compact('data'));
        } catch (\Exception $error) {
            $kegiatanDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('user.view.dashboard')->with('error', 'Maaf ada kesalahan sistem,harap dicoba kembali');
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
            $this->updateKegiatanService($id, $kegiatanDomain, $request, Auth::guard('user')->user());
            DB::commit();
            return redirect()->route('uppsfaculty.Kegiatan.index')->with('success', 'Berhasil update kegiatan');
        } catch (\Exception $error) {
            DB::rollBack();
            $kegiatanDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('uppsfaculty.Kegiatan.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
        }
    }

    /**
     * @method destroyKegiatanCase
     * @param int $id
     * @param $request
     * @param $kegiatanDomain
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
            return redirect()->route('uppsfaculty.Kegiatan.index')->with('success', 'Berhasil delete kegiatan');
        } catch (\Exception $error) {
            DB::rollBack();
            $kegiatanDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('uppsfaculty.Kegiatan.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
        }
    }

    /**
     * =============================================================================================================================================================
     * feature: file manager
     * =============================================================================================================================================================
     */

    /**
     * @method indexFileManagerCase
     * @param $request
     * @return View|RedirectResponse
     */
    public function indexFileManagerCase(): View|RedirectResponse
    {
        try {
            return view('Modules.Users.FileManager.index');
        } catch (\Exception $error) {
            return redirect()->route('user.view.dashboard')->with('error', $error->getMessage());
        }
    }
}
