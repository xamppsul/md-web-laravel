<?php

namespace App\Modules\UppsOrFakultas\interfaces;

interface Services_interfaces
{
    /**
     * asset
     */
    public function indexAssetService($asetDomain, $request): array;
    public function createAssetService();
    public function storeAssetService($request, $asetDomain): void;
    public function editAssetService(int $id, $asetDomain): array;
    public function updateAssetService(int $id, $asetDomain, $request): void;
    public function destroyAssetService(int $id, $asetDomain): void;
    /**
     * moumoa
     */
    public function indexMouMoaService($mouMoaDomain, $request): array;
    public function createMouMoaService();
    public function storeMouMoaService($request, $mouMoaDomain): void;
    public function editMouMoaService(int $id, $mouMoaDomain): array;
    public function updateMouMoaService(int $id, $mouMoaDomain, $request): void;
    public function destroyMouMoaService(int $id, $mouMoaDomain): void;
    /**
     * kegiatan
     */
    public function indexKegiatanService($kegiatanDomain, $request): array;
    public function createKegiatanService();
    public function storeKegiatanService($request, $kegiatanDomain): void;
    public function editKegiatanService(int $id, $kegiatanDomain): array;
    public function updateKegiatanService(int $id, $kegiatanDomain, $request): void;
    public function destroyKegiatanService(int $id, $kegiatanDomain): void;
}
