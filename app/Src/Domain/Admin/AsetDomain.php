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
     * @return array
     */
    public function getAllAsetDomain(): array
    {
        return DB::select('
            SELECT aset.*, 
            kategori_aset.name AS kategori_aset_name, 
            kondisi_aset.name AS kondisi_aset_name,
            status_aset.name AS status_aset_name
            FROM aset
            INNER JOIN kategori_aset ON aset.kategori_aset = kategori_aset.id
            INNER JOIN kondisi_aset ON aset.kondisi_aset = kondisi_aset.id
            INNER JOIN status_aset ON aset.status_aset = status_aset.id
        ');
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
            kategori_aset.name AS kategori_aset_name, 
            kondisi_aset.name AS kondisi_aset_name,
            status_aset.name AS status_aset_name
            FROM aset
            INNER JOIN kategori_aset ON aset.kategori_aset = kategori_aset.id
            INNER JOIN kondisi_aset ON aset.kondisi_aset = kondisi_aset.id
            INNER JOIN status_aset ON aset.status_aset = status_aset.id
            WHERE aset.id = ?
        ', [$id]);
    }

    /**
     * @method getKategoriAsetDomain
     * @return array
     */
    public function getKategoriAsetDomain(): array
    {
        return DB::select('SELECT * FROM kategori_aset');
    }

    /**
     * @method getKondisiAsetDomain
     * @return array
     */
    public function getKondisiAsetDomain(): array
    {
        return DB::select('SELECT * FROM kondisi_aset');
    }

    /**
     * @method getStatusAsetDomain
     * @return array
     */
    public function getStatusAsetDomain(): array
    {
        return DB::select('SELECT * FROM status_aset');
    }

    /**
     * @method postDataAsetDomain
     * @param $request
     * @return void
     */
    public function postDataAsetDomain($request): void
    {
        DB::insert('insert into aset 
            (kode_aset,
            nama_aset,
            kategori_aset,
            merek_model,
            tanggal_perolehan,
            lokasi_aset,
            kondisi_aset,
            status_aset,
            harga_perolehan,
            sumber_dana,
            keterangan,
            created_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $request->kode_aset,
            $request->nama_aset,
            $request->kategori_aset,
            $request->model_merk_aset,
            $request->tanggal_perolehan_aset,
            $request->lokasi_aset,
            $request->kondisi_aset,
            $request->status_aset,
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
            kode_aset = ?, 
            nama_aset = ?, 
            kategori_aset = ?, 
            merek_model = ?, 
            tanggal_perolehan = ?, 
            lokasi_aset = ?, 
            kondisi_aset = ?, 
            status_aset = ?, 
            harga_perolehan = ?, 
            sumber_dana = ?, 
            keterangan = ?, 
            updated_at = ?
            WHERE id = ?', [
            $request->kode_aset,
            $request->nama_aset,
            $request->kategori_aset,
            $request->model_merk_aset,
            $request->tanggal_perolehan_aset,
            $request->lokasi_aset,
            $request->kondisi_aset,
            $request->status_aset,
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
