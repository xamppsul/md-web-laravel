<?php

namespace App\Modules\UppsOrFakultas\repository;

use App\Modules\UppsOrFakultas\interfaces\Repository_interfaces;

class Repository implements Repository_interfaces
{
    /**======================================================================================================================================
     * feture: asset
    /**======================================================================================================================================
     */
    /**
     * index
     */
    /**
     * @method indexAssetRepository
     * @param $asetDomain
     * @return array
     */
    public function indexAssetRepository($asetDomain, $request): array
    {
        return array(
            'kategori' => $asetDomain->getKategoriAsetDomain(),
            'status' => $asetDomain->getStatusAsetDomain(),
            'kondisi' => $asetDomain->getKondisiAsetDomain(),
            'aset' => $asetDomain->getAllAsetDomain($request),
        );
    }
    public function createAssetRepository()
    {
        return 'create asset repository';
    }
    /**
     * store
     */
    /**
     * @method storeAssetRepository
     * @param $request
     * @param $asetDomain
     * @return void
     */
    public function storeAssetRepository($request, $asetDomain): void
    {
        $asetDomain->postDataAsetDomain($request);
    }
    /**
     * edit
     */
    /**
     * @method editAssetRepository
     * @param int $id
     * @param $asetDomain
     * @return array
     */
    public function editAssetRepository(int $id, $asetDomain): array
    {
        return array(
            'kategori' => $asetDomain->getKategoriAsetDomain(),
            'status' => $asetDomain->getStatusAsetDomain(),
            'kondisi' => $asetDomain->getKondisiAsetDomain(),
            'aset' => $asetDomain->getDetailAsetDomain($id)[0],
        );
    }
    /**
     * update
     */
    /**
     * @method updateAssetRepository
     * @param int $id
     * @param $asetDomain
     * @param $request
     * @return array
     */
    public function updateAssetRepository(int $id, $asetDomain, $request): void
    {
        $asetDomain->updateDataAsetDomain($id, $request);
    }

    /**
     * destroy
     */
    /**
     * @method destroyAssetRepository
     * @param int $id
     * @param $asetDomain
     * @return void
     */
    public function destroyAssetRepository(int $id, $asetDomain): void
    {
        $asetDomain->deleteDataAsetDomain($id);
    }

    /**======================================================================================================================================
     * feture: mou moa
    /**======================================================================================================================================
    /**
     * index
     */
    /**
     * @method indexMouMoaRepository
     * @param $mouMoaDomain
     * @return array
     */
    public function indexMouMoaRepository($mouMoaDomain, $request): array
    {
        return array(
            'kerjasama' => $mouMoaDomain->getBidangKerjaSamaMouMoaDomain(),
            'klasifikasi' => $mouMoaDomain->getKlasifikasiMouMoaDomain(),
            'status' => $mouMoaDomain->getStatusMouMoaDomain(),
            'moumoa' => $mouMoaDomain->getAllMouMoaDomain($request),
            'user' => $mouMoaDomain->getUserByRoleFaculty(),
            'jenis_dokumen' => $mouMoaDomain->getJenisDokumenMouMoaDomain(),
        );
    }
    public function createMouMoaRepository()
    {
        return 'create MouMoa repository';
    }
    /**
     * store
     */
    /**
     * @method storeMouMoaRepository
     * @param $request
     * @param $mouMoaDomain
     * @return void
     */
    public function storeMouMoaRepository($request, $mouMoaDomain, string $filePendukung): void
    {
        $mouMoaDomain->postDataMouMoaDomain($request, $filePendukung);
    }
    /**
     * edit
     */
    /**
     * @method editMouMoaRepository
     * @param int $id
     * @param $mouMoaDomain
     * @return array
     */
    public function editMouMoaRepository(int $id, $mouMoaDomain): array
    {
        return array(
            'kerjasama' => $mouMoaDomain->getBidangKerjaSamaMouMoaDomain(),
            'klasifikasi' => $mouMoaDomain->getKlasifikasiMouMoaDomain(),
            'status' => $mouMoaDomain->getStatusMouMoaDomain(),
            'moumoa' => $mouMoaDomain->getDetailMouMoaDomain($id)[0],
            'user' => $mouMoaDomain->getUserByRoleFaculty(),
            'jenis_dokumen' => $mouMoaDomain->getJenisDokumenMouMoaDomain(),
        );
    }
    /**
     * update
     */
    /**
     * @method updateMouMoaRepository
     * @param int $id
     * @param $mouMoaDomain
     * @param $request
     * @return array
     */
    public function updateMouMoaRepository(int $id, $mouMoaDomain, $request, string $filePendukung): void
    {
        $mouMoaDomain->updateDataMouMoaDomain($id, $request, $filePendukung);
    }

    /**
     * destroy
     */
    /**
     * @method destroyMouMoaRepository
     * @param int $id
     * @param $mouMoaDomain
     * @return void
     */
    public function destroyMouMoaRepository(int $id, $mouMoaDomain): void
    {
        $mouMoaDomain->deleteDataMouMoaDomain($id);
    }

    //============================= file upload ==============================

    public function doUploadFilePendukung($request, $user): string
    {
        $file = $request->file('dokumen_pendukung');
        $namaFile = time() . "_" . $file->getClientOriginalName();
        //move upload file
        $dirUploadFile = public_path("MD_disk/{$user->name}/MouMoa");
        $file->move($dirUploadFile, $namaFile);
        return $namaFile;
    }

    /**======================================================================================================================================
     * feture: kegiatan
    /**======================================================================================================================================
     */
    /**
     * index
     */
    /**
     * @method indexKegiatanRepository
     * @param $kegiatanDomain
     * @return array
     */
    public function indexKegiatanRepository($kegiatanDomain, $request): array
    {
        return array(
            'status' => $kegiatanDomain->getStatusKegiatan(),
            'jenis' => $kegiatanDomain->getJenisKegiatan(),
            'kegiatan' => $kegiatanDomain->getAllKegiatanDomain($request),
        );
    }
    public function createKegiatanRepository()
    {
        return 'create Kegiatan repository';
    }
    /**
     * store
     */
    /**
     * @method storeKegiatanRepository
     * @param $request
     * @param $kegiatanDomain
     * @param $fileDaftarHadir
     * @param $fileKegiatan
     * @return void
     */
    public function storeKegiatanRepository($request, $kegiatanDomain, string $fileDaftarHadir, string $fileKegiatan): void
    {
        $kegiatanDomain->postDataKegiatanDomain($request, $fileDaftarHadir, $fileKegiatan);
    }
    /**
     * edit
     */
    /**
     * @method editKegiatanRepository
     * @param int $id
     * @param $kegiatanDomain
     * @return array
     */
    public function editKegiatanRepository(int $id, $kegiatanDomain): array
    {
        return array(
            'status' => $kegiatanDomain->getStatusKegiatan(),
            'jenis' => $kegiatanDomain->getJenisKegiatan(),
            'kegiatan' => $kegiatanDomain->getDetailKegiatanDomain($id)[0],
        );
    }
    /**
     * update
     */
    /**
     * @method updateKegiatanRepository
     * @param int $id
     * @param $kegiatanDomain
     * @param $request
     * @return array
     */
    public function updateKegiatanRepository(int $id, $kegiatanDomain, $request, string $fileDaftarHadir, string $fileKegiatan): void
    {
        $kegiatanDomain->updateDataKegiatanDomain($id, $request, $fileDaftarHadir, $fileKegiatan);
    }

    /**
     * destroy
     */
    /**
     * @method destroyKegiatanRepository
     * @param int $id
     * @param $kegiatanDomain
     * @return void
     */
    public function destroyKegiatanRepository(int $id, $kegiatanDomain): void
    {
        $kegiatanDomain->deleteDataKegiatanDomain($id);
    }

    public function doUploadFileDaftarHadirKegiatan($request, $user): string
    {
        $file = $request->file('file_daftar_hadir');
        $namaFile = time() . "_" . $file->getClientOriginalName();
        //move upload file
        $dirUploadFile = public_path("MD_disk/{$user->name}/DaftarHadirKegiatan");
        $file->move($dirUploadFile, $namaFile);
        return $namaFile;
    }

    public function doUploadFileDokumentasiKegiatan($request, $user): string
    {
        $file = $request->file('file_kegiatan');
        $namaFile = time() . "_" . $file->getClientOriginalName();
        //move upload file
        $dirUploadFile = public_path("MD_disk/{$user->name}/DokumentasiKegiatan");
        $file->move($dirUploadFile, $namaFile);
        return $namaFile;
    }
}
