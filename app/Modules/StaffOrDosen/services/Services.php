<?php

namespace App\Modules\StaffOrDosen\services;

use App\Modules\StaffOrDosen\interfaces\Services_interfaces;
use App\Modules\StaffOrDosen\repository\Repository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class Services extends Repository implements Services_interfaces
{
    /**======================================================================================================================================================================
     * feature: BahanAjar
    /**======================================================================================================================================================================
     */

    /**
     * @method indexBahanAjarService
     * @param $bahanAjarDomain
     * @return array
     */
    public function indexBahanAjarService($bahanAjarDomain, $request): array
    {
        return $this->indexBahanAjarRepository($bahanAjarDomain, $request);
    }

    /**
     * @method createBahanAjarService
     * @return mixed
     */
    public function createBahanAjarService()
    {
        return $this->createBahanAjarRepository();
    }

    /**
     * @method storeBahanAjarService
     * @param $request
     * @param $bahanAjarDomain
     * @return void
     */
    public function storeBahanAjarService($request, $bahanAjarDomain, $user): void
    {
        $this->storeBahanAjarRepository($request, $bahanAjarDomain, $this->doUploadFileBahanAjar($request, $user));
    }

    /**
     * @method editBahanAjarService
     * @param int $id
     * @param $bahanAjarDomain
     * @return array
     */
    public function editBahanAjarService(int $id, $bahanAjarDomain): array
    {
        return $this->editBahanAjarRepository($id, $bahanAjarDomain);
    }

    /**
     * @method updateBahanAjarService
     * @param int $id
     * @param $bahanAjarDomain
     * @param $request
     * @return void
     */
    public function updateBahanAjarService(int $id, $bahanAjarDomain, $request, $user): void
    {
        $this->updateBahanAjarRepository($id, $bahanAjarDomain, $request, $this->doUploadFileBahanAjar($request, $user));
    }

    /**
     * @method destroyBahanAjarService
     * @param int $id
     * @param $bahanAjarDomain
     * @return void
     */
    public function destroyBahanAjarService(int $id, $bahanAjarDomain): void
    {
        $this->destroyBahanAjarRepository($id, $bahanAjarDomain);
    }


    /**======================================================================================================================================================================
     * feature: Penelitian
    /**======================================================================================================================================================================
     */

    /**
     * @method indexPenelitianService
     * @param $penelitianDomain
     * @return array
     */
    public function indexPenelitianService($penelitianDomain, $request): array
    {
        return $this->indexPenelitianRepository($penelitianDomain, $request);
    }

    /**
     * @method createPenelitianService
     * @return mixed
     */
    public function createPenelitianService()
    {
        return $this->createPenelitianRepository();
    }

    /**
     * @method storePenelitianService
     * @param $request
     * @param $penelitianDomain
     * @return void
     */
    public function storePenelitianService($request, $penelitianDomain, $user): void
    {
        $this->storePenelitianRepository($request, $penelitianDomain, $this->doUploadFileLaporanAkhirPenelitian($request, $user));
    }

    /**
     * @method editPenelitianService
     * @param int $id
     * @param $penelitianDomain
     * @return array
     */
    public function editPenelitianService(int $id, $penelitianDomain): array
    {
        return $this->editPenelitianRepository($id, $penelitianDomain);
    }

    /**
     * @method updatePenelitianService
     * @param int $id
     * @param $penelitianDomain
     * @param $request
     * @return void
     */
    public function updatePenelitianService(int $id, $penelitianDomain, $request, $user): void
    {
        $this->updatePenelitianRepository($id, $penelitianDomain, $request, $this->doUploadFileLaporanAkhirPenelitian($request, $user));
    }

    /**
     * @method destroyPenelitianService
     * @param int $id
     * @param $penelitianDomain
     * @return void
     */
    public function destroyPenelitianService(int $id, $penelitianDomain): void
    {
        $this->destroyPenelitianRepository($id, $penelitianDomain);
    }

    /**======================================================================================================================================================================
     * feature: Pengabdian
    /**======================================================================================================================================================================
     */

    /**
     * @method indexPengabdianService
     * @param $pengabdianDomain
     * @return array
     */
    public function indexPengabdianService($pengabdianDomain, $request): array
    {
        return $this->indexPengabdianRepository($pengabdianDomain, $request);
    }

    /**
     * @method createPengabdianService
     * @return mixed
     */
    public function createPengabdianService()
    {
        return $this->createPengabdianRepository();
    }

    /**
     * @method storePengabdianService
     * @param $request
     * @param $pengabdianDomain
     * @return void
     */
    public function storePengabdianService($request, $pengabdianDomain, $user): void
    {
        $this->storePengabdianRepository($request, $pengabdianDomain, $this->doUploadFileLaporanPengabdian($request, $user), $this->doUploadFileDokumentasiPengabdian($request, $user));
    }

    /**
     * @method editPengabdianService
     * @param int $id
     * @param $pengabdianDomain
     * @return array
     */
    public function editPengabdianService(int $id, $pengabdianDomain): array
    {
        return $this->editPengabdianRepository($id, $pengabdianDomain);
    }

    /**
     * @method updatePengabdianService
     * @param int $id
     * @param $pengabdianDomain
     * @param $request
     * @return void
     */
    public function updatePengabdianService(int $id, $pengabdianDomain, $request, $user): void
    {
        $this->updatePengabdianRepository($id, $pengabdianDomain, $request, $this->doUploadFileLaporanPengabdian($request, $user), $this->doUploadFileDokumentasiPengabdian($request, $user));
    }

    /**
     * @method destroyPengabdianService
     * @param int $id
     * @param $pengabdianDomain
     * @return void
     */
    public function destroyPengabdianService(int $id, $pengabdianDomain): void
    {
        $this->destroyPengabdianRepository($id, $pengabdianDomain);
    }

    /**======================================================================================================================================================================
     * feature: RiwayatJabatan
    /**======================================================================================================================================================================
     */

    /**
     * @method indexRiwayatJabatanService
     * @param $riwayatJabatanDomain
     * @return array
     */
    public function indexRiwayatJabatanService($riwayatJabatanDomain, $request): array
    {
        return $this->indexRiwayatJabatanRepository($riwayatJabatanDomain, $request);
    }

    /**
     * @method createRiwayatJabatanService
     * @return mixed
     */
    public function createRiwayatJabatanService()
    {
        return $this->createRiwayatJabatanRepository();
    }

    /**
     * @method storeRiwayatJabatanService
     * @param $request
     * @param mixed $user
     * @param $riwayatJabatanDomain
     */
    public function storeRiwayatJabatanService($request, $riwayatJabatanDomain, mixed $user)
    {
        if (
            !empty($request->riwayat_jabatan_status) &&
            $request->riwayat_jabatan_status == 1 &&
            !empty($request->tanggal_selesai)
        ) {
            return redirect()->route('staffdosen.RiwayatJabatan.index')->with('error', 'Jika statusnya masih aktif menjabat maka tanggal selesai menjabat harus di kosongkan');
        }

        if (
            !empty($request->riwayat_jabatan_status) &&
            $request->riwayat_jabatan_status == 2 &&
            empty($request->tanggal_selesai)
        ) {
            return redirect()->route('staffdosen.RiwayatJabatan.index')->with('error', 'Jika statusnya nonaktif menjabat maka tanggal selesai menjabat wajib di isi');
        }

        if (!DB::table('riwayat_jabatan')->where([
            ['users_id', '=', $user->id],
            ['riwayat_jabatan_status', '=', 1]
        ])->first()) {
            return $this->storeRiwayatJabatanRepository($request, $riwayatJabatanDomain, $this->doUploadFileDocumentSkRiwayatJabatan($request, $user));
        }

        return redirect()->route('staffdosen.RiwayatJabatan.index')->with('error', 'Gagal menambahkan riwayat jabatan karena anda masih sementara aktif menjabat');
    }

    /**
     * @method editRiwayatJabatanService
     * @param int $id
     * @param $riwayatJabatanDomain
     * @return array
     */
    public function editRiwayatJabatanService(int $id, $riwayatJabatanDomain): array
    {
        return $this->editRiwayatJabatanRepository($id, $riwayatJabatanDomain);
    }

    /**
     * @method updateRiwayatJabatanService
     * @param int $id
     * @param $riwayatJabatanDomain
     * @param mixed $user
     * @param $request
     */
    public function updateRiwayatJabatanService(int $id, $riwayatJabatanDomain, $request, mixed $user)
    {
        if (
            !empty($request->riwayat_jabatan_status) &&
            $request->riwayat_jabatan_status == 1 &&
            !empty($request->tanggal_selesai)
        ) {
            return redirect()->route('staffdosen.RiwayatJabatan.index')->with('error', 'Jika statusnya masih aktif menjabat maka tanggal selesai menjabat harus di kosongkan');
        }

        if (
            !empty($request->riwayat_jabatan_status) &&
            $request->riwayat_jabatan_status == 2 &&
            empty($request->tanggal_selesai)
        ) {
            return redirect()->route('staffdosen.RiwayatJabatan.index')->with('error', 'Jika statusnya nonaktif menjabat maka tanggal selesai menjabat wajib di isi');
        }

        if (DB::table('riwayat_jabatan')->where([
            ['users_id', '=', $user->id],
            ['riwayat_jabatan_status', '=', 1]
        ])->first()) {
            //althought already exists but change status jabatan to non active can be allow to update riwayat jabatan
            if ($request->riwayat_jabatan_status == 2) {
                return $this->updateRiwayatJabatanRepository($id, $riwayatJabatanDomain, $request, $this->doUploadFileDocumentSkRiwayatJabatan($request, $user));
            }
            //as default protected from duplicated jabatan which active status(menghindari rangkap jabatan)
            return redirect()->route('staffdosen.RiwayatJabatan.index')->with('error', 'Gagal update riwayat jabatan karena anda masih sementara aktif menjabat');
        }
        return $this->updateRiwayatJabatanRepository($id, $riwayatJabatanDomain, $request, $this->doUploadFileDocumentSkRiwayatJabatan($request, $user));
    }

    /**
     * @method destroyRiwayatJabatanService
     * @param int $id
     * @param $riwayatJabatanDomain
     * @return void
     */
    public function destroyRiwayatJabatanService(int $id, $riwayatJabatanDomain): void
    {
        $this->destroyRiwayatJabatanRepository($id, $riwayatJabatanDomain);
    }

    /**======================================================================================================================================================================
     * feature: ListPublikasi
    /**======================================================================================================================================================================
     */

    /**
     * @method indexListPublikasiService
     * @param $listPublikasiDomain
     * @return array
     */
    public function indexListPublikasiService($listPublikasiDomain, $request): array
    {
        return $this->indexListPublikasiRepository($listPublikasiDomain, $request);
    }

    /**
     * @method createListPublikasiService
     * @return mixed
     */
    public function createListPublikasiService()
    {
        return $this->createListPublikasiRepository();
    }

    /**
     * @method storeListPublikasiService
     * @param $request
     * @param $listPublikasiDomain
     * @return void
     */
    public function storeListPublikasiService($request, $listPublikasiDomain, $user): void
    {
        $this->storeListPublikasiRepository($request, $listPublikasiDomain, $this->doUploadFileListPublikasi($request, $user));
    }

    /**
     * @method editListPublikasiService
     * @param int $id
     * @param $listPublikasiDomain
     * @return array
     */
    public function editListPublikasiService(int $id, $listPublikasiDomain): array
    {
        return $this->editListPublikasiRepository($id, $listPublikasiDomain);
    }

    /**
     * @method updateListPublikasiService
     * @param int $id
     * @param $listPublikasiDomain
     * @param $request
     * @return void
     */
    public function updateListPublikasiService(int $id, $listPublikasiDomain, $request, $user): void
    {
        $this->updateListPublikasiRepository($id, $listPublikasiDomain, $request, $this->doUploadFileListPublikasi($request, $user));
    }

    /**
     * @method destroyListPublikasiService
     * @param int $id
     * @param $listPublikasiDomain
     * @return void
     */
    public function destroyListPublikasiService(int $id, $listPublikasiDomain): void
    {
        $this->destroyListPublikasiRepository($id, $listPublikasiDomain);
    }
}
