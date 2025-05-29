<?php

namespace App\Src\Domain\Admin;

use Illuminate\Support\Facades\DB;

class AsetDomain
{
    /**
     * @method DomainLogInsert
     *  transaction data with log error to table log_errors
     * @param $message
     * @param $route
     * @param $path
     * @param $type
     * @return void
     */

    public function DomainLogInsert(
        string $message,
        string $route,
        string $path,
        string $type,
    ): void {
        DB::insert('insert into logs (message,route,path,type,created_at,updated_at) values (?, ?, ?, ?, ?, ?)', [$message, $route, $path, $type, now(), now()]);
    }
    /**=========================================================================================================
     * feature: master data aset
    /**=========================================================================================================
     */
    /**
     * @method getAllAsetDomain
     * @param $request
     * @return array
     */
    public function getAllAsetDomain(
        $request
    ): array {
        return DB::select('
            SELECT aset.*, 
                aset_kategori.name AS aset_kategori_name, 
                aset_kondisi.name AS aset_kondisi_name,
                aset_status.name AS aset_status_name
            FROM aset
                INNER JOIN aset_kategori ON aset.aset_kategori = aset_kategori.id
                INNER JOIN aset_kondisi ON aset.aset_kondisi = aset_kondisi.id
                INNER JOIN aset_status ON aset.aset_status = aset_status.id
            WHERE aset.aset_kondisi LIKE ? 
                AND aset.aset_status LIKE ? 
                AND aset.aset_kategori LIKE ?
            ORDER BY aset.kode_aset DESC
        ', [
            "%$request->kondisi_aset%",
            "%$request->status_aset%",
            "%$request->kategori_aset%"
        ]);
    }

    /**
     * @method getDetailAsetDomain
     * @param $id
     * @return array
     */
    public function getDetailAsetDomain($id): array
    {
        return DB::select('
            SELECT aset.*, 
                aset_kategori.name AS aset_kategori_name, 
                aset_kondisi.name AS aset_kondisi_name,
                aset_status.name AS aset_status_name
            FROM aset
                INNER JOIN aset_kategori ON aset.aset_kategori = aset_kategori.id
                INNER JOIN aset_kondisi ON aset.aset_kondisi = aset_kondisi.id
                INNER JOIN aset_status ON aset.aset_status = aset_status.id
            WHERE aset.id = ?
        ', [$id]);
    }

    /**
     * @method getKategoriAsetDomain
     * @return array
     */
    public function getKategoriAsetDomain(): array
    {
        return DB::select('SELECT * FROM aset_kategori');
    }

    /**
     * @method getKondisiAsetDomain
     * @return array
     */
    public function getKondisiAsetDomain(): array
    {
        return DB::select('SELECT * FROM aset_kondisi');
    }

    /**
     * @method getStatusAsetDomain
     * @return array
     */
    public function getStatusAsetDomain(): array
    {
        return DB::select('SELECT * FROM aset_status');
    }

    /**
     * @method postDataAsetDomain
     * @param $request
     * @return void
     */
    public function postDataAsetDomain($request): void
    {
        DB::insert('insert into aset 
            (users_id,
            kode_aset,
            nama_aset,
            aset_kategori,
            merek_model,
            tahun,
            tanggal_perolehan,
            lokasi_aset,
            aset_kondisi,
            aset_status,
            harga_perolehan,
            sumber_dana,
            keterangan,
            created_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $request->users_id,
            $request->kode_aset,
            $request->nama_aset,
            $request->aset_kategori,
            $request->model_merk_aset,
            $request->tahun,
            $request->tanggal_perolehan_aset,
            $request->lokasi_aset,
            $request->aset_kondisi,
            $request->aset_status,
            $request->harga_perolehan_aset,
            $request->sumber_dana_aset,
            $request->keterangan_aset,
            now(),
        ]);
    }

    /**
     * @method updateDataAsetDomain
     * @param $request
     * @param $id
     * @return void
     */

    public function updateDataAsetDomain($id, $request): void
    {
        DB::update('UPDATE aset SET 
            users_id = ?, 
            kode_aset = ?, 
            nama_aset = ?, 
            aset_kategori = ?, 
            merek_model = ?, 
            tahun = ?, 
            tanggal_perolehan = ?, 
            lokasi_aset = ?, 
            aset_kondisi = ?, 
            aset_status = ?, 
            harga_perolehan = ?, 
            sumber_dana = ?, 
            keterangan = ?, 
            updated_at = ?
            WHERE id = ?', [
            $request->users_id,
            $request->kode_aset,
            $request->nama_aset,
            $request->aset_kategori,
            $request->model_merk_aset,
            $request->tahun,
            $request->tanggal_perolehan_aset,
            $request->lokasi_aset,
            $request->aset_kondisi,
            $request->aset_status,
            $request->harga_perolehan_aset,
            $request->sumber_dana_aset,
            $request->keterangan_aset,
            now(),
            $id
        ]);
    }

    /**
     * @method deleteDataAsetDomain
     * @param $id
     * @return void
     */

    public function deleteDataAsetDomain($id): void
    {
        DB::delete('DELETE FROM aset WHERE id = ?', [$id]);
    }
}
