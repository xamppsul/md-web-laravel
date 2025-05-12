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
    public function indexAssetRepository($asetDomain): array
    {
        return array(
            'kategori' => $asetDomain->getKategoriAsetDomain(),
            'status' => $asetDomain->getStatusAsetDomain(),
            'kondisi' => $asetDomain->getKondisiAsetDomain(),
            'aset' => $asetDomain->getAsetDomain(),
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
     * @param $request,
     * @param $asetDomain,
     * @return void
     */
    public function storeAssetRepository($request, $asetDomain): void
    {
        $asetDomain->postDataAsetDomain($request);
    }
    public function editAssetRepository($id)
    {
        return 'edit asset repository';
    }
    public function updateAssetRepository($id)
    {
        return 'update asset repository';
    }
    public function destroyAssetRepository($id)
    {
        return 'destroy asset repository';
    }

    /**======================================================================================================================================
     * feture: master data mou moa
    /**======================================================================================================================================
     */
    public function indexMouMoaRepository()
    {
        return 'index MouMoa repository';
    }
    public function createMouMoaRepository()
    {
        return 'create MouMoa repository';
    }
    public function storeMouMoaRepository($request)
    {
        return 'store MouMoa repository';
    }
    public function editMouMoaRepository($id)
    {
        return 'edit MouMoa repository';
    }
    public function updateMouMoaRepository($id)
    {
        return 'update MouMoa repository';
    }
    public function destroyMouMoaRepository($id)
    {
        return 'destroy MouMoa repository';
    }

    /**======================================================================================================================================
     * feture: master data kegiatan
    /**======================================================================================================================================
     */
    public function indexKegiatanRepository()
    {
        return 'index Kegiatan repository';
    }
    public function createKegiatanRepository()
    {
        return 'create Kegiatan repository';
    }
    public function storeKegiatanRepository($request)
    {
        return 'store Kegiatan repository';
    }
    public function editKegiatanRepository($id)
    {
        return 'edit Kegiatan repository';
    }
    public function updateKegiatanRepository($id)
    {
        return 'update Kegiatan repository';
    }
    public function destroyKegiatanRepository($id)
    {
        return 'destroy Kegiatan repository';
    }
}
