<?php

namespace App\Modules\Administrator\repository;

use App\Modules\Administrator\interfaces\Repository_interfaces;

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
     * update
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
    public function storeMouMoaRepository($request, $mouMoaDomain): void
    {
        $mouMoaDomain->postDataMouMoaDomain($request);
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
            'aset' => $mouMoaDomain->getDetailMouMoaDomain($id)[0],
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
    public function updateMouMoaRepository(int $id, $mouMoaDomain, $request): void
    {
        $mouMoaDomain->updateDataMouMoaDomain($id, $request);
    }

    /**
     * update
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

    /**======================================================================================================================================
     * feture: master data kegiatan
    /**======================================================================================================================================
     */
    /**
     * index
     */
    /**
     * @method indexKegiatanRepository
     * @param $asetDomain
     * @return array
     */
    public function indexKegiatanRepository($asetDomain, $request): array
    {
        return array(
            'kategori' => $asetDomain->getKategoriAsetDomain(),
            'status' => $asetDomain->getStatusAsetDomain(),
            'kondisi' => $asetDomain->getKondisiAsetDomain(),
            'aset' => $asetDomain->getAllAsetDomain($request),
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
     * @param $asetDomain
     * @return void
     */
    public function storeKegiatanRepository($request, $asetDomain): void
    {
        $asetDomain->postDataAsetDomain($request);
    }
    /**
     * edit
     */
    /**
     * @method editKegiatanRepository
     * @param int $id
     * @param $asetDomain
     * @return array
     */
    public function editKegiatanRepository(int $id, $asetDomain): array
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
     * @method updateKegiatanRepository
     * @param int $id
     * @param $asetDomain
     * @param $request
     * @return array
     */
    public function updateKegiatanRepository(int $id, $asetDomain, $request): void
    {
        $asetDomain->updateDataAsetDomain($id, $request);
    }

    /**
     * update
     */
    /**
     * @method destroyKegiatanRepository
     * @param int $id
     * @param $asetDomain
     * @return void
     */
    public function destroyKegiatanRepository(int $id, $asetDomain): void
    {
        $asetDomain->deleteDataAsetDomain($id);
    }
}
