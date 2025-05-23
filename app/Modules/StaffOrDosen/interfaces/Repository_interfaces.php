<?php

namespace App\Modules\StaffOrDosen\interfaces;

interface Repository_interfaces
{
    /**===========================================================================
     * feature: BahanAjar 
    /**===========================================================================
     */
    public function indexBahanAjarRepository($bahanAjarDomain, $request): array;
    public function createBahanAjarRepository();
    public function storeBahanAjarRepository($request, $bahanAjarDomain, string $fileBahanAjar): void;
    public function editBahanAjarRepository(int $id, $bahanAjarDomain): array;
    public function updateBahanAjarRepository(int $id, $bahanAjarDomain, $request, string $fileBahanAjar): void;
    public function destroyBahanAjarRepository(int $id, $bahanAjarDomain): void;

    //file upload
    public function doUploadFileBahanAjar($request): string;


    /**===========================================================================
     * feature: penelitian
    /**===========================================================================
     */
    public function indexPenelitianRepository($penelitianDomain, $request): array;
    public function createPenelitianRepository();
    public function storePenelitianRepository($request, $penelitianDomain, string $fileLaporanAkhirPenelitian): void;
    public function editPenelitianRepository(int $id, $penelitianDomain): array;
    public function updatePenelitianRepository(int $id, $penelitianDomain, $request, string $fileLaporanAkhirPenelitian): void;
    public function destroyPenelitianRepository(int $id, $penelitianDomain): void;

    //file upload
    public function doUploadFileLaporanAkhirPenelitian($request): string;

    /**===========================================================================
     * feature: Pengabdian 
    /**===========================================================================
     */
    public function indexPengabdianRepository($PengabdianDomain, $request): array;
    public function createPengabdianRepository();
    public function storePengabdianRepository($request, $PengabdianDomain, string $fileLaporanPengabdian, string $fileDokumentasiPengabdian): void;
    public function editPengabdianRepository(int $id, $PengabdianDomain): array;
    public function updatePengabdianRepository(int $id, $PengabdianDomain, $request, string $fileLaporanPengabdian, string $fileDokumentasiPengabdian): void;
    public function destroyPengabdianRepository(int $id, $PengabdianDomain): void;

    //file upload
    public function doUploadFileLaporanPengabdian($request): string;
    public function doUploadFileDokumentasiPengabdian($request): string;

    /**===========================================================================
     * feature: RiwayatJabatan 
    /**===========================================================================
     */
    public function indexRiwayatJabatanRepository($riwayatJabatanDomain, $request): array;
    public function createRiwayatJabatanRepository();
    public function storeRiwayatJabatanRepository($request, $riwayatJabatanDomain, string $fileDocumentSkRiwayatJabatan): void;
    public function editRiwayatJabatanRepository(int $id, $riwayatJabatanDomain): array;
    public function updateRiwayatJabatanRepository(int $id, $riwayatJabatanDomain, $request, string $fileDocumentSkRiwayatJabatan): void;
    public function destroyRiwayatJabatanRepository(int $id, $riwayatJabatanDomain): void;

    //file upload
    public function doUploadFileDocumentSkRiwayatJabatan($request): string;
}
