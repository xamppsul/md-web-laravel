<?php

namespace App\Modules\StaffOrDosen\usecase;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Modules\StaffOrDosen\services\Services;
use App\Modules\StaffOrDosen\interfaces\Usecase_intefaces;

class Usecase extends Services implements Usecase_intefaces
{
    /**
     * =============================================================================================================================================================
     * feature: BahanAjar
     * =============================================================================================================================================================
     */

    /**
     * @method indexBahanAjarCase
     * @param $bahanAjarDomain
     * @param $request
     * @return RedirectResponse|View
     */
    public function indexBahanAjarCase(
        $bahanAjarDomain,
        $request,
    ): RedirectResponse|View {
        try {
            $data = $this->indexBahanAjarService($bahanAjarDomain, $request);
            return view('Modules.Users.BahanAjar.index', compact('data'));
        } catch (\Exception $error) {
            $bahanAjarDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('user.view.dashboard')->with('error', 'Maaf ada kesalahan sistem,harap dicoba kembali');
        }
    }

    /**
     * @method createBahanAjarCase
     * @return View
     */
    public function createBahanAjarCase(): View
    {
        return view('');
    }

    /**
     * @method storeBahanAjarCase
     * @param $request
     * @param $bahanAjarDomain
     * @param $bahanAjarRequest
     * @return RedirectResponse
     */
    public function storeBahanAjarCase(
        $request,
        $bahanAjarDomain,
        $bahanAjarRequest
    ): RedirectResponse {
        $bahanAjarRequest->postRequestData($request);

        DB::beginTransaction();
        try {
            $this->storeBahanAjarService($request, $bahanAjarDomain);
            DB::commit();
            return redirect()->route('staffdosen.BahanAjar.index')->with('success', 'Berhasil tambah Bahan Ajar');
        } catch (\Exception $error) {
            DB::rollBack();
            $bahanAjarDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('staffdosen.BahanAjar.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
        }
    }

    /**
     * @method editBahanAjarCase
     * @param int $id
     * @param $bahanAjarDomain
     * @param $request
     * @return RedirectResponse|View
     */
    public function editBahanAjarCase(
        int $id,
        $bahanAjarDomain,
        $request,
    ): RedirectResponse|View {
        try {
            $data = $this->editBahanAjarService($id, $bahanAjarDomain);
            return view('Modules.Users.BahanAjar.edit', compact('data'));
        } catch (\Exception $error) {
            $bahanAjarDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('user.view.dashboard')->with('error', 'Maaf ada kesalahan sistem,harap dicoba kembali');
        }
    }

    /**
     * @method updateBahanAjarCase
     * @param int $id
     * @param $request
     * @param $bahanAjarDomain
     * @param $bahanAjarRequest
     * @return RedirectResponse
     */
    public function updateBahanAjarCase(
        int $id,
        $request,
        $bahanAjarDomain,
        $bahanAjarRequest,
    ): RedirectResponse {
        $bahanAjarRequest->updateRequestData($request);

        DB::beginTransaction();
        try {
            $this->updateBahanAjarService($id, $bahanAjarDomain, $request);
            DB::commit();
            return redirect()->route('staffdosen.BahanAjar.index')->with('success', 'Berhasil update Bahan Ajar');
        } catch (\Exception $error) {
            DB::rollBack();
            $bahanAjarDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('staffdosen.BahanAjar.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
        }
    }

    /**
     * @method destroyBahanAjarCase
     * @param int $id
     * @param $request
     * @param $bahanAjarDomain
     * @return RedirectResponse
     */
    public function destroyBahanAjarCase(
        int $id,
        $request,
        $bahanAjarDomain,
    ): RedirectResponse {

        DB::beginTransaction();
        try {
            $this->destroyBahanAjarService($id, $bahanAjarDomain);
            DB::commit();
            return redirect()->route('staffdosen.BahanAjar.index')->with('success', 'Berhasil delete Bahan Ajar');
        } catch (\Exception $error) {
            DB::rollBack();
            $bahanAjarDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('staffdosen.BahanAjar.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
        }
    }

    /**
     * =============================================================================================================================================================
     * feature: Penelitian
     * =============================================================================================================================================================
     */

    /**
     * @method indexPenelitianCase
     * @param $penelitianDomain
     * @param $request
     * @return RedirectResponse|View
     */
    public function indexPenelitianCase(
        $penelitianDomain,
        $request,
    ): RedirectResponse|View {
        try {
            $data = $this->indexPenelitianService($penelitianDomain, $request);
            return view('Modules.Users.Penelitian.index', compact('data'));
        } catch (\Exception $error) {
            $penelitianDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('user.view.dashboard')->with('error', 'Maaf ada kesalahan sistem,harap dicoba kembali');
        }
    }

    /**
     * @method createPenelitianCase
     * @return View
     */
    public function createPenelitianCase(): View
    {
        return view('');
    }

    /**
     * @method storePenelitianCase
     * @param $request
     * @param $penelitianDomain
     * @param $penelitianRequest
     * @return RedirectResponse
     */
    public function storePenelitianCase(
        $request,
        $penelitianDomain,
        $penelitianRequest
    ): RedirectResponse {
        $penelitianRequest->postRequestData($request);

        DB::beginTransaction();
        try {
            $this->storePenelitianService($request, $penelitianDomain);
            DB::commit();
            return redirect()->route('staffdosen.Penelitian.index')->with('success', 'Berhasil tambah penelitian');
        } catch (\Exception $error) {
            DB::rollBack();
            $penelitianDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('staffdosen.Penelitian.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
        }
    }

    /**
     * @method editPenelitianCase
     * @param int $id
     * @param $penelitianDomain
     * @param $request
     * @return RedirectResponse|View
     */
    public function editPenelitianCase(
        int $id,
        $penelitianDomain,
        $request,
    ): RedirectResponse|View {
        try {
            $data = $this->editPenelitianService($id, $penelitianDomain);
            return view('Modules.Users.Penelitian.edit', compact('data'));
        } catch (\Exception $error) {
            $penelitianDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('user.view.dashboard')->with('error', 'Maaf ada kesalahan sistem,harap dicoba kembali');
        }
    }

    /**
     * @method updatePenelitianCase
     * @param int $id
     * @param $request
     * @param $penelitianDomain
     * @param $penelitianRequest
     * @return RedirectResponse
     */
    public function updatePenelitianCase(
        int $id,
        $request,
        $penelitianDomain,
        $penelitianRequest,
    ): RedirectResponse {
        $penelitianRequest->updateRequestData($request);

        DB::beginTransaction();
        try {
            $this->updatePenelitianService($id, $penelitianDomain, $request);
            DB::commit();
            return redirect()->route('staffdosen.Penelitian.index')->with('success', 'Berhasil update penelitian');
        } catch (\Exception $error) {
            DB::rollBack();
            $penelitianDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('staffdosen.Penelitian.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
        }
    }

    /**
     * @method destroyPenelitianCase
     * @param int $id
     * @param $request
     * @param $penelitianDomain
     * @return RedirectResponse
     */
    public function destroyPenelitianCase(
        int $id,
        $request,
        $penelitianDomain,
    ): RedirectResponse {

        DB::beginTransaction();
        try {
            $this->destroyPenelitianService($id, $penelitianDomain);
            DB::commit();
            return redirect()->route('staffdosen.Penelitian.index')->with('success', 'Berhasil delete penelitian');
        } catch (\Exception $error) {
            DB::rollBack();
            $penelitianDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('staffdosen.Penelitian.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
        }
    }

    /**
     * =============================================================================================================================================================
     * feature: Pengabdian
     * =============================================================================================================================================================
     */

    /**
     * @method indexPengabdianCase
     * @param $pengabdianDomain
     * @param $request
     * @return RedirectResponse|View
     */
    public function indexPengabdianCase(
        $pengabdianDomain,
        $request,
    ): RedirectResponse|View {
        try {
            $data = $this->indexPengabdianService($pengabdianDomain, $request);
            return view('Modules.Users.Pengabdian.index', compact('data'));
        } catch (\Exception $error) {
            $pengabdianDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('user.view.dashboard')->with('error', 'Maaf ada kesalahan sistem,harap dicoba kembali');
        }
    }

    /**
     * @method createPengabdianCase
     * @return View
     */
    public function createPengabdianCase(): View
    {
        return view('');
    }

    /**
     * @method storePengabdianCase
     * @param $request
     * @param $pengabdianDomain
     * @param $pengabdianRequest
     * @return RedirectResponse
     */
    public function storePengabdianCase(
        $request,
        $pengabdianDomain,
        $pengabdianRequest
    ): RedirectResponse {
        $pengabdianRequest->postRequestData($request);

        DB::beginTransaction();
        try {
            $this->storePengabdianService($request, $pengabdianDomain);
            DB::commit();
            return redirect()->route('staffdosen.Pengabdian.index')->with('success', 'Berhasil tambah pengabdian');
        } catch (\Exception $error) {
            DB::rollBack();
            $pengabdianDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('staffdosen.Pengabdian.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
        }
    }

    /**
     * @method editPengabdianCase
     * @param int $id
     * @param $pengabdianDomain
     * @param $request
     * @return RedirectResponse|View
     */
    public function editPengabdianCase(
        int $id,
        $pengabdianDomain,
        $request,
    ): RedirectResponse|View {
        try {
            $data = $this->editPengabdianService($id, $pengabdianDomain);
            return view('Modules.Users.Pengabdian.edit', compact('data'));
        } catch (\Exception $error) {
            $pengabdianDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('user.view.dashboard')->with('error', 'Maaf ada kesalahan sistem,harap dicoba kembali');
        }
    }

    /**
     * @method updatePengabdianCase
     * @param int $id
     * @param $request
     * @param $pengabdianDomain
     * @param $pengabdianRequest
     * @return RedirectResponse
     */
    public function updatePengabdianCase(
        int $id,
        $request,
        $pengabdianDomain,
        $pengabdianRequest,
    ): RedirectResponse {
        $pengabdianRequest->updateRequestData($request);

        DB::beginTransaction();
        try {
            $this->updatePengabdianService($id, $pengabdianDomain, $request);
            DB::commit();
            return redirect()->route('staffdosen.Pengabdian.index')->with('success', 'Berhasil update pengabdian');
        } catch (\Exception $error) {
            DB::rollBack();
            $pengabdianDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('staffdosen.Pengabdian.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
        }
    }

    /**
     * @method destroyPengabdianCase
     * @param int $id
     * @param $request
     * @param $pengabdianDomain
     * @return RedirectResponse
     */
    public function destroyPengabdianCase(
        int $id,
        $request,
        $pengabdianDomain,
    ): RedirectResponse {

        DB::beginTransaction();
        try {
            $this->destroyPengabdianService($id, $pengabdianDomain);
            DB::commit();
            return redirect()->route('staffdosen.Pengabdian.index')->with('success', 'Berhasil delete pengabdian');
        } catch (\Exception $error) {
            DB::rollBack();
            $pengabdianDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('staffdosen.Pengabdian.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
        }
    }

    /**
     * ============================================================================
     * feature: file manager
     * ============================================================================
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

    /**
     * =============================================================================================================================================================
     * feature: RiwayatJabatan
     * =============================================================================================================================================================
     */

    /**
     * @method indexRiwayatJabatanCase
     * @param $riwayatJabatanDomain
     * @param $request
     * @return RedirectResponse|View
     */
    public function indexRiwayatJabatanCase(
        $riwayatJabatanDomain,
        $request,
    ): RedirectResponse|View {
        try {
            $data = $this->indexRiwayatJabatanService($riwayatJabatanDomain, $request);
            return view('Modules.Users.RiwayatJabatan.index', compact('data'));
        } catch (\Exception $error) {
            $riwayatJabatanDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('user.view.dashboard')->with('error', 'Maaf ada kesalahan sistem,harap dicoba kembali');
        }
    }

    /**
     * @method createRiwayatJabatanCase
     * @return View
     */
    public function createRiwayatJabatanCase(): View
    {
        return view('');
    }

    /**
     * @method storeRiwayatJabatanCase
     * @param $request
     * @param $riwayatJabatanDomain
     * @param $riwayatJabatanRequest
     * @return RedirectResponse
     */
    public function storeRiwayatJabatanCase(
        $request,
        $riwayatJabatanDomain,
        $riwayatJabatanRequest
    ): RedirectResponse {
        $riwayatJabatanRequest->postRequestData($request);

        DB::beginTransaction();
        try {
            $this->storeRiwayatJabatanService($request, $riwayatJabatanDomain);
            DB::commit();
            return redirect()->route('staffdosen.RiwayatJabatan.index')->with('success', 'Berhasil tambah Riwayat Jabatan');
        } catch (\Exception $error) {
            DB::rollBack();
            $riwayatJabatanDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('staffdosen.RiwayatJabatan.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
        }
    }

    /**
     * @method editRiwayatJabatanCase
     * @param int $id
     * @param $riwayatJabatanDomain
     * @param $request
     * @return RedirectResponse|View
     */
    public function editRiwayatJabatanCase(
        int $id,
        $riwayatJabatanDomain,
        $request,
    ): RedirectResponse|View {
        try {
            $data = $this->editRiwayatJabatanService($id, $riwayatJabatanDomain);
            return view('Modules.Users.RiwayatJabatan.edit', compact('data'));
        } catch (\Exception $error) {
            $riwayatJabatanDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('user.view.dashboard')->with('error', 'Maaf ada kesalahan sistem,harap dicoba kembali');
        }
    }

    /**
     * @method updateRiwayatJabatanCase
     * @param int $id
     * @param $request
     * @param $riwayatJabatanDomain
     * @param $riwayatJabatanRequest
     * @return RedirectResponse
     */
    public function updateRiwayatJabatanCase(
        int $id,
        $request,
        $riwayatJabatanDomain,
        $riwayatJabatanRequest,
    ): RedirectResponse {
        $riwayatJabatanRequest->updateRequestData($request);

        DB::beginTransaction();
        try {
            $this->updateRiwayatJabatanService($id, $riwayatJabatanDomain, $request);
            DB::commit();
            return redirect()->route('staffdosen.RiwayatJabatan.index')->with('success', 'Berhasil update Riwayat Jabatan');
        } catch (\Exception $error) {
            DB::rollBack();
            $riwayatJabatanDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('staffdosen.RiwayatJabatan.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
        }
    }

    /**
     * @method destroyRiwayatJabatanCase
     * @param int $id
     * @param $request
     * @param $riwayatJabatanDomain
     * @return RedirectResponse
     */
    public function destroyRiwayatJabatanCase(
        int $id,
        $request,
        $riwayatJabatanDomain,
    ): RedirectResponse {

        DB::beginTransaction();
        try {
            $this->destroyRiwayatJabatanService($id, $riwayatJabatanDomain);
            DB::commit();
            return redirect()->route('staffdosen.RiwayatJabatan.index')->with('success', 'Berhasil delete Riwayat Jabatan');
        } catch (\Exception $error) {
            DB::rollBack();
            $riwayatJabatanDomain->DomainLogInsert($error->getMessage(), $request->route()->getName(), $request->path(), 'error');
            return redirect()->route('staffdosen.RiwayatJabatan.index')->with('error', 'Maaf ada kesalahan sistem,silahkan coba lagi');
        }
    }
}
