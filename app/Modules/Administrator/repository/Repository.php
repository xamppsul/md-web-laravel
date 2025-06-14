<?php

namespace App\Modules\Administrator\repository;

use App\Modules\Administrator\interfaces\Repository_interfaces;
use Illuminate\Support\Facades\DB;

class Repository implements Repository_interfaces
{
    /**======================================================================================================================================
     * feture: master data asset
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
            'aset_kategori' => $asetDomain->getKategoriAsetDomain(),
            'aset_status' => $asetDomain->getStatusAsetDomain(),
            'aset_kondisi' => $asetDomain->getKondisiAsetDomain(),
            'user_faculty' => $asetDomain->getUserFacultyDomain(),
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
            'aset_kategori' => $asetDomain->getKategoriAsetDomain(),
            'aset_status' => $asetDomain->getStatusAsetDomain(),
            'aset_kondisi' => $asetDomain->getKondisiAsetDomain(),
            'user_faculty' => $asetDomain->getUserFacultyDomain(),
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
     * feture: master data mou moa
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

    //============================= file upload:moumoa ==============================

    /**
     * @method doUploadFilePendukung
     * @param $request
     * @param $DB_USER
     * @return string
     */
    public function doUploadFilePendukung($request, $DB_USER): string|bool
    {
        //init file upload
        if (!empty($request->file('dokumen_pendukung'))) {
            $file = $request->file('dokumen_pendukung');
            $namaFile = time() . "_" . $file->getClientOriginalName();
            //move upload file
            $dirUploadFile = public_path("MD_disk/{$DB_USER->id}-{$DB_USER->name}/MouMoa");
            $file->move($dirUploadFile, $namaFile);
            return $namaFile;
        }
        return false;
    }

    /**======================================================================================================================================
     * feture: master data kegiatan
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
            'user' => $kegiatanDomain->getUserByRoleFaculty(),
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
            'user' => $kegiatanDomain->getUserByRoleFaculty(),
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

    //================================================ file upload:kegiatan ===============================================
    /**
     * @method doUploadFileDaftarHadirKegiatan
     * @param $request
     * @param $DB_USER
     * @return string|bool
     */
    public function doUploadFileDaftarHadirKegiatan($request, $DB_USER): string|bool
    {
        if (!empty($request->file('file_daftar_hadir'))) {
            $file = $request->file('file_daftar_hadir');
            $namaFile = time() . "_" . $file->getClientOriginalName();
            //move upload file
            $dirUploadFile = 'docsKegiatanDaftarHadir';
            $dirUploadFile = public_path("MD_disk/{$DB_USER->id}-{$DB_USER->name}/DaftarHadirKegiatan");
            $file->move($dirUploadFile, $namaFile);
            return $namaFile;
        }
        return false;
    }

    /**
     * @method doUploadFileDokumentasiKegiatan
     * @param $request
     * @param $DB_USER
     * @return string|bool
     */
    public function doUploadFileDokumentasiKegiatan($request, $DB_USER): string|bool
    {
        if (!empty($request->file('file_kegiatan'))) {
            $file = $request->file('file_kegiatan');
            $namaFile = time() . "_" . $file->getClientOriginalName();
            //move upload file
            $dirUploadFile = 'docsFileKegiatan';
            $dirUploadFile = public_path("MD_disk/{$DB_USER->id}-{$DB_USER->name}/DokumentasiKegiatan");
            $file->move($dirUploadFile, $namaFile);
            return $namaFile;
        }
        return false;
    }


    /**======================================================================================================================================
     * feture: master data user
    /**======================================================================================================================================
     */
    /**
     * index
     */
    /**
     * @method indexUserMasterRepository
     * @param $userMasterDomain
     * @return array
     */
    public function indexUserMasterRepository($userMasterDomain, $request): array
    {
        return array(
            'role' => $userMasterDomain->getRolesUserMasterDomain(),
            'usermaster' => $userMasterDomain->getAllUserMasterDomain($request),
        );
    }

    public function createUserMasterRepository()
    {
        return 'create user master';
    }
    /**
     * store
     */
    /**
     * @method storeUserMasterRepository
     * @param $request
     * @param $userMasterDomain
     * @return void
     */
    public function storeUserMasterRepository($request, $userMasterDomain): void
    {
        $userMasterDomain->postDataUserMasterDomain($request);
    }
    /**
     * edit
     */
    /**
     * @method editUserMasterRepository
     * @param int $id
     * @param $userMasterDomain
     * @return array
     */
    public function editUserMasterRepository(int $id, $userMasterDomain): array
    {
        return array(
            'role' => $userMasterDomain->getRolesUserMasterDomain(),
            'usermaster' => $userMasterDomain->getDetailUserMasterDomain($id)[0],
        );
    }
    /**
     * update
     */
    /**
     * @method updateUserMasterRepository
     * @param int $id
     * @param $userMasterDomain
     * @param $request
     * @return array
     */
    public function updateUserMasterRepository(int $id, $userMasterDomain, $request): void
    {
        $userMasterDomain->updateDataUserMasterDomain($id, $request);
    }

    /**
     * destroy
     */
    /**
     * @method destroyUserMasterRepository
     * @param int $id
     * @param $userMasterDomain
     * @return void
     */
    public function destroyUserMasterRepository(int $id, $userMasterDomain): void
    {
        $userMasterDomain->deleteDataUserMasterDomain($id);
    }

    /**======================================================================================================================================
     * feture: master data log
    /**======================================================================================================================================
     */
    /**
     * index
     */

    /**
     * @method indexLogUserRepository
     * @param $logUserDomain
     * @param $request
     */
    public function indexLogUserRepository($logUserDomain, $request): array
    {
        return array(
            'userlog' => $logUserDomain->getAllLogUserDomain($request),
        );
    }
}
