<?php

namespace App\Modules\StaffOrDosen\repository;

use App\Modules\StaffOrDosen\interfaces\Repository_interfaces;

class Repository implements Repository_interfaces
{
    /**======================================================================================================================================
     * feture: BahanAjar
    /**======================================================================================================================================
     */
    /**
     * index
     */
    /**
     * @method indexBahanAjarRepository
     * @param $bahanAjarDomain
     * @return array
     */
    public function indexBahanAjarRepository($bahanAjarDomain, $request): array
    {
        return array(
            'jenis' => $bahanAjarDomain->getJenisBahanAjarDomain(),
            'status_penggunaan' => $bahanAjarDomain->getStatusPenggunaanBahanAjarDomain(),
            'bahanAjar' => $bahanAjarDomain->getAllBahanAjarDomain($request),
        );
    }
    public function createBahanAjarRepository()
    {
        return 'create BahanAjar repository';
    }
    /**
     * store
     */
    /**
     * @method storeBahanAjarRepository
     * @param $request
     * @param $bahanAjarDomain
     * @param string $fileBahanAjar
     * @return void
     */
    public function storeBahanAjarRepository($request, $bahanAjarDomain, string $fileBahanAjar): void
    {
        $bahanAjarDomain->postDataBahanAjarDomain($request, $fileBahanAjar);
    }
    /**
     * edit
     */
    /**
     * @method editBahanAjarRepository
     * @param int $id
     * @param $bahanAjarDomain
     * @return array
     */
    public function editBahanAjarRepository(int $id, $bahanAjarDomain): array
    {
        return array(
            'jenis' => $bahanAjarDomain->getJenisBahanAjarDomain(),
            'status_penggunaan' => $bahanAjarDomain->getStatusPenggunaanBahanAjarDomain(),
            'bahanAjar' => $bahanAjarDomain->getDetailBahanAjarDomain($id)[0],
        );
    }
    /**
     * update
     */
    /**
     * @method updateBahanAjarRepository
     * @param int $id
     * @param $bahanAjarDomain
     * @param $request
     * @param string $fileBahanAjar
     * @return array
     */
    public function updateBahanAjarRepository(int $id, $bahanAjarDomain, $request, string $fileBahanAjar): void
    {
        $bahanAjarDomain->updateDataBahanAjarDomain($id, $request, $fileBahanAjar);
    }

    /**
     * destroy
     */
    /**
     * @method destroyBahanAjarRepository
     * @param int $id
     * @param $bahanAjarDomain
     * @return void
     */
    public function destroyBahanAjarRepository(int $id, $bahanAjarDomain): void
    {
        $bahanAjarDomain->deleteDataBahanAjarDomain($id);
    }

    //file upload
    public function doUploadFileBahanAjar($request): string
    {
        $file = $request->file('file_bahan');
        $namaFile = time() . "_" . $file->getClientOriginalName();
        //move upload file
        $dirUploadFile = 'bahan_ajar';
        $file->move($dirUploadFile, $namaFile);
        return $namaFile;
    }

    /**======================================================================================================================================
     * feture: Penelitian
    /**======================================================================================================================================
     */
    /**
     * index
     */
    /**
     * @method indexPenelitianRepository
     * @param $penelitianDomain
     * @return array
     */
    public function indexPenelitianRepository($penelitianDomain, $request): array
    {
        return array(
            'sumber_dana_penelitian' => $penelitianDomain->getSumberDanaPenelitianDomain(),
            'status_penelitian' => $penelitianDomain->getStatusPenelitianDomain(),
            'penelitian' => $penelitianDomain->getAllPenelitianDomain($request),
        );
    }
    public function createPenelitianRepository()
    {
        return 'create Penelitian repository';
    }
    /**
     * store
     */
    /**
     * @method storePenelitianRepository
     * @param $request
     * @param $penelitianDomain
     * @param string $fileLaporanAkhirPenelitian
     * @return void
     */
    public function storePenelitianRepository($request, $penelitianDomain, string $fileLaporanAkhirPenelitian): void
    {
        $penelitianDomain->postDataPenelitianDomain($request, $fileLaporanAkhirPenelitian);
    }
    /**
     * edit
     */
    /**
     * @method editPenelitianRepository
     * @param int $id
     * @param $penelitianDomain
     * @return array
     */
    public function editPenelitianRepository(int $id, $penelitianDomain): array
    {
        return array(
            'sumber_dana_penelitian' => $penelitianDomain->getSumberDanaPenelitianDomain(),
            'status_penelitian' => $penelitianDomain->getStatusPenelitianDomain(),
            'penelitian' => $penelitianDomain->getDetailPenelitianDomain($id)[0],
        );
    }
    /**
     * update
     */
    /**
     * @method updatePenelitianRepository
     * @param int $id
     * @param $penelitianDomain
     * @param $request
     * @param string $fileLaporanAkhirPenelitian
     * @return array
     */
    public function updatePenelitianRepository(int $id, $penelitianDomain, $request, string $fileLaporanAkhirPenelitian): void
    {
        $penelitianDomain->updateDataPenelitianDomain($id, $request, $fileLaporanAkhirPenelitian);
    }

    /**
     * destroy
     */
    /**
     * @method destroyPenelitianRepository
     * @param int $id
     * @param $penelitianDomain
     * @return void
     */
    public function destroyPenelitianRepository(int $id, $penelitianDomain): void
    {
        $penelitianDomain->deleteDataPenelitianDomain($id);
    }

    //file upload
    public function doUploadFileLaporanAkhirPenelitian($request): string
    {
        $file = $request->file('laporan_akhir');
        $namaFile = time() . "_" . $file->getClientOriginalName();
        //move upload file
        $dirUploadFile = 'laporan_akhir_penelitian';
        $file->move($dirUploadFile, $namaFile);
        return $namaFile;
    }

    /**======================================================================================================================================
     * feture: Pengabdian
    /**======================================================================================================================================
     */
    /**
     * index
     */
    /**
     * @method indexPengabdianRepository
     * @param $pengabdianDomain
     * @return array
     */
    public function indexPengabdianRepository($pengabdianDomain, $request): array
    {
        return array(
            'bidang_pengabdian' => $pengabdianDomain->getBidangPengabdianDomain(),
            'sumber_dana_pengabdian' => $pengabdianDomain->getSumberDanaPengabdianDomain(),
            'status_pengabdian' => $pengabdianDomain->getStatusPengabdianDomain(),
            'pengabdian' => $pengabdianDomain->getAllPengabdianDomain($request),
        );
    }
    public function createPengabdianRepository()
    {
        return 'create Pengabdian repository';
    }
    /**
     * store
     */
    /**
     * @method storePengabdianRepository
     * @param $request
     * @param $pengabdianDomain
     * @param string $fileLaporanPengabdian
     * @param string $fileDokumentasiPengabdian
     * @return void
     */
    public function storePengabdianRepository($request, $pengabdianDomain, string $fileLaporanPengabdian, string $fileDokumentasiPengabdian): void
    {
        $pengabdianDomain->postDataPengabdianDomain($request, $fileLaporanPengabdian, $fileDokumentasiPengabdian);
    }
    /**
     * edit
     */
    /**
     * @method editPengabdianRepository
     * @param int $id
     * @param $pengabdianDomain
     * @return array
     */
    public function editPengabdianRepository(int $id, $pengabdianDomain): array
    {
        return array(
            'bidang_pengabdian' => $pengabdianDomain->getBidangPengabdianDomain(),
            'sumber_dana_pengabdian' => $pengabdianDomain->getSumberDanaPengabdianDomain(),
            'status_pengabdian' => $pengabdianDomain->getStatusPengabdianDomain(),
            'pengabdian' => $pengabdianDomain->getDetailPengabdianDomain($id)[0],
        );
    }
    /**
     * update
     */
    /**
     * @method updatePengabdianRepository
     * @param int $id
     * @param $pengabdianDomain
     * @param $request
     * @param string $fileLaporanPengabdian
     * @param string $fileDokumentasiPengabdian
     * @return array
     */
    public function updatePengabdianRepository(int $id, $pengabdianDomain, $request, string $fileLaporanPengabdian, string $fileDokumentasiPengabdian): void
    {
        $pengabdianDomain->updateDataPengabdianDomain($id, $request, $fileLaporanPengabdian, $fileDokumentasiPengabdian);
    }

    /**
     * destroy
     */
    /**
     * @method destroyPengabdianRepository
     * @param int $id
     * @param $pengabdianDomain
     * @return void
     */
    public function destroyPengabdianRepository(int $id, $pengabdianDomain): void
    {
        $pengabdianDomain->deleteDataPengabdianDomain($id);
    }

    //file upload
    public function doUploadFileLaporanPengabdian($request): string
    {
        $file = $request->file('laporan_pengabdian');
        $namaFile = time() . "_" . $file->getClientOriginalName();
        //move upload file
        $dirUploadFile = 'laporan_pengabdian';
        $file->move($dirUploadFile, $namaFile);
        return $namaFile;
    }

    public function doUploadFileDokumentasiPengabdian($request): string
    {
        $file = $request->file('dokumentasi');
        $namaFile = time() . "_" . $file->getClientOriginalName();
        //move upload file
        $dirUploadFile = 'dokumentasi_pengabdian';
        $file->move($dirUploadFile, $namaFile);
        return $namaFile;
    }

    /**======================================================================================================================================
     * feture: RiwayatJabatan
    /**======================================================================================================================================
     */
    /**
     * index
     */
    /**
     * @method indexRiwayatJabatanRepository
     * @param $riwayatJabatanDomain
     * @return array
     */
    public function indexRiwayatJabatanRepository($riwayatJabatanDomain, $request): array
    {
        return array(
            'riwayat_jabatan_jenis' => $riwayatJabatanDomain->getJenisRiwayatJabatanDomain(),
            'riwayat_jabatan_status' => $riwayatJabatanDomain->getStatusRiwayatJabatanDomain(),
            'riwayatJabatan' => $riwayatJabatanDomain->getAllRiwayatJabatanDomain($request),
        );
    }
    public function createRiwayatJabatanRepository()
    {
        return 'create RiwayatJabatan repository';
    }
    /**
     * store
     */
    /**
     * @method storeRiwayatJabatanRepository
     * @param $request
     * @param $riwayatJabatanDomain
     * @param string $fileRiwayatJabatan
     * @return void
     */
    public function storeRiwayatJabatanRepository($request, $riwayatJabatanDomain, string $fileDocumentSkRiwayatJabatan): void
    {
        $riwayatJabatanDomain->postDataRiwayatJabatanDomain($request, $fileDocumentSkRiwayatJabatan);
    }
    /**
     * edit
     */
    /**
     * @method editRiwayatJabatanRepository
     * @param int $id
     * @param $riwayatJabatanDomain
     * @return array
     */
    public function editRiwayatJabatanRepository(int $id, $riwayatJabatanDomain): array
    {
        return array(
            'riwayat_jabatan_jenis' => $riwayatJabatanDomain->getJenisRiwayatJabatanDomain(),
            'riwayat_jabatan_status' => $riwayatJabatanDomain->getStatusRiwayatJabatanDomain(),
            'riwayatJabatan' => $riwayatJabatanDomain->getDetailRiwayatJabatanDomain($id)[0],
        );
    }
    /**
     * update
     */
    /**
     * @method updateRiwayatJabatanRepository
     * @param int $id
     * @param $riwayatJabatanDomain
     * @param $request
     * @param string $fileRiwayatJabatan
     * @return array
     */
    public function updateRiwayatJabatanRepository(int $id, $riwayatJabatanDomain, $request, string $fileDocumentSkRiwayatJabatan): void
    {
        $riwayatJabatanDomain->updateDataRiwayatJabatanDomain($id, $request, $fileDocumentSkRiwayatJabatan);
    }

    /**
     * destroy
     */
    /**
     * @method destroyRiwayatJabatanRepository
     * @param int $id
     * @param $riwayatJabatanDomain
     * @return void
     */
    public function destroyRiwayatJabatanRepository(int $id, $riwayatJabatanDomain): void
    {
        $riwayatJabatanDomain->deleteDataRiwayatJabatanDomain($id);
    }

    //file upload
    public function doUploadFileDocumentSkRiwayatJabatan($request): string
    {
        $file = $request->file('dokumen_sk');
        $namaFile = time() . "_" . $file->getClientOriginalName();
        //move upload file
        $dirUploadFile = 'dokumen_sk_riwayat_jabatan';
        $file->move($dirUploadFile, $namaFile);
        return $namaFile;
    }

    /**======================================================================================================================================
     * feture: ListPublikasi
    /**======================================================================================================================================
     */
    /**
     * index
     */
    /**
     * @method indexListPublikasiRepository
     * @param $listPublikasiDomain
     * @return array
     */
    public function indexListPublikasiRepository($listPublikasiDomain, $request): array
    {
        return array(
            'jenis_list_publikasi' => $listPublikasiDomain->getJenisListPublikasiDomain(),
            'status_list_publikasi' => $listPublikasiDomain->getStatusListPublikasiDomain(),
            'list_publikasi' => $listPublikasiDomain->getAllListPublikasiDomain($request),
        );
    }
    public function createListPublikasiRepository()
    {
        return 'create ListPublikasi repository';
    }
    /**
     * store
     */
    /**
     * @method storeListPublikasiRepository
     * @param $request
     * @param $listPublikasiDomain
     * @param string $fileListPublikasi
     * @return void
     */
    public function storeListPublikasiRepository($request, $listPublikasiDomain, string $fileListPublikasi): void
    {
        $listPublikasiDomain->postDataListPublikasiDomain($request, $fileListPublikasi);
    }
    /**
     * edit
     */
    /**
     * @method editListPublikasiRepository
     * @param int $id
     * @param $listPublikasiDomain
     * @return array
     */
    public function editListPublikasiRepository(int $id, $listPublikasiDomain): array
    {
        return array(
            'jenis_list_publikasi' => $listPublikasiDomain->getJenisListPublikasiDomain(),
            'status_list_publikasi' => $listPublikasiDomain->getStatusListPublikasiDomain(),
            'list_publikasi' => $listPublikasiDomain->getDetailListPublikasiDomain($id)[0],
        );
    }
    /**
     * update
     */
    /**
     * @method updateListPublikasiRepository
     * @param int $id
     * @param $listPublikasiDomain
     * @param $request
     * @param string $fileListPublikasi
     * @return array
     */
    public function updateListPublikasiRepository(int $id, $listPublikasiDomain, $request, string $fileListPublikasi): void
    {
        $listPublikasiDomain->updateDataListPublikasiDomain($id, $request, $fileListPublikasi);
    }

    /**
     * destroy
     */
    /**
     * @method destroyListPublikasiRepository
     * @param int $id
     * @param $listPublikasiDomain
     * @return void
     */
    public function destroyListPublikasiRepository(int $id, $listPublikasiDomain): void
    {
        $listPublikasiDomain->deleteDataListPublikasiDomain($id);
    }

    //file upload
    public function doUploadFileListPublikasi($request): string
    {
        $file = $request->file('file_publikasi');
        $namaFile = time() . "_" . $file->getClientOriginalName();
        //move upload file
        $dirUploadFile = 'file_publikasi';
        $file->move($dirUploadFile, $namaFile);
        return $namaFile;
    }
}
