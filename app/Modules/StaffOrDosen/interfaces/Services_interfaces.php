<?php

namespace App\Modules\StaffOrDosen\interfaces;

interface Services_interfaces
{
    /**
     * BahanAjar
     */
    public function indexBahanAjarService($asetDomain, $request): array;
    public function createBahanAjarService();
    public function storeBahanAjarService($request, $asetDomain): void;
    public function editBahanAjarService(int $id, $asetDomain): array;
    public function updateBahanAjarService(int $id, $asetDomain, $request): void;
    public function destroyBahanAjarService(int $id, $asetDomain): void;
    /**
     * Penelitian
     */
    public function indexPenelitianService($penelitianDomain, $request): array;
    public function createPenelitianService();
    public function storePenelitianService($request, $penelitianDomain): void;
    public function editPenelitianService(int $id, $penelitianDomain): array;
    public function updatePenelitianService(int $id, $penelitianDomain, $request): void;
    public function destroyPenelitianService(int $id, $penelitianDomain): void;
    /**
     * Pengabdian
     */
    public function indexPengabdianService($pengabdianDomain, $request): array;
    public function createPengabdianService();
    public function storePengabdianService($request, $pengabdianDomain): void;
    public function editPengabdianService(int $id, $pengabdianDomain): array;
    public function updatePengabdianService(int $id, $pengabdianDomain, $request): void;
    public function destroyPengabdianService(int $id, $pengabdianDomain): void;
    /**
     * RiwayatJabatan
     */
    public function indexRiwayatJabatanService($asetDomain, $request): array;
    public function createRiwayatJabatanService();
    public function storeRiwayatJabatanService($request, $asetDomain): void;
    public function editRiwayatJabatanService(int $id, $asetDomain): array;
    public function updateRiwayatJabatanService(int $id, $asetDomain, $request): void;
    public function destroyRiwayatJabatanService(int $id, $asetDomain): void;

    /**
     * ListPublikasi
     */
    public function indexListPublikasiService($asetDomain, $request): array;
    public function createListPublikasiService();
    public function storeListPublikasiService($request, $asetDomain): void;
    public function editListPublikasiService(int $id, $asetDomain): array;
    public function updateListPublikasiService(int $id, $asetDomain, $request): void;
    public function destroyListPublikasiService(int $id, $asetDomain): void;
}
