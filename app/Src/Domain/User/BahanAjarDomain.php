<?php

namespace App\Src\Domain\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BahanAjarDomain
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
     * feature: BahanAjar
    /**=========================================================================================================
     */
    /**
     * @method getAllBahanAjarDomain
     * @param $request
     * @return array
     */
    public function getAllBahanAjarDomain(
        $request
    ): array {
        return DB::select('
            SELECT bahan_ajar.*,
                bahan_ajar_jenis.name AS bahan_ajar_jenis_name,
                bahan_ajar_status_penggunaan.name AS bahan_ajar_status_penggunaan_name,
                users.name AS dosen_name,
                users.id AS dosen_id
            FROM bahan_ajar
                INNER JOIN bahan_ajar_jenis ON bahan_ajar.bahan_ajar_jenis = bahan_ajar_jenis.id
                INNER JOIN bahan_ajar_status_penggunaan ON bahan_ajar.bahan_ajar_status_penggunaan = bahan_ajar_status_penggunaan.id
                INNER JOIN users ON bahan_ajar.users_id = users.id
            WHERE bahan_ajar.bahan_ajar_jenis LIKE ?
                AND bahan_ajar.bahan_ajar_status_penggunaan LIKE ?
                AND bahan_ajar.users_id = ?
            ORDER BY bahan_ajar.id DESC
        ', [
            "%$request->bahan_ajar_jenis%",
            "%$request->bahan_ajar_status_penggunaan%",
            Auth::guard('user')->user()->id
        ]);
    }

    /**
     * @method getDetailBahanAjarDomain
     * @param $id
     * @return array
     */
    public function getDetailBahanAjarDomain($id): array
    {
        return DB::select('
            SELECT bahan_ajar.*,
                bahan_ajar_jenis.name AS bahan_ajar_jenis_name,
                bahan_ajar_status_penggunaan.name AS bahan_ajar_status_penggunaan_name
            FROM bahan_ajar
                INNER JOIN bahan_ajar_jenis ON bahan_ajar.bahan_ajar_jenis = bahan_ajar_jenis.id
                INNER JOIN bahan_ajar_status_penggunaan ON bahan_ajar.bahan_ajar_status_penggunaan = bahan_ajar_status_penggunaan.id
            WHERE bahan_ajar.id = ?
                AND bahan_ajar.users_id = ?
        ', [
            $id,
            Auth::guard('user')->user()->id
        ]);
    }

    /**
     * @method getJenisBahanAjarDomain
     * @return array
     */
    public function getJenisBahanAjarDomain(): array
    {
        return DB::select('SELECT * FROM bahan_ajar_jenis');
    }

    /**
     * @method getStatusPenggunaanBahanAjarDomain
     * @return array
     */
    public function getStatusPenggunaanBahanAjarDomain(): array
    {
        return DB::select('SELECT * FROM bahan_ajar_status_penggunaan');
    }

    /**
     * @method postDataBahanAjarDomain
     * @param $request
     * @param string $fileBahan
     * @return void
     */
    public function postDataBahanAjarDomain($request, string $fileBahan): void
    {
        DB::insert('insert into bahan_ajar
            (users_id,
            judul,
            bahan_ajar_jenis,
            mata_kuliah,
            program_studi,
            semester,
            tanggal_terbit,
            deskripsi,
            file_bahan,
            link_bahan,
            bahan_ajar_status_penggunaan,
            created_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            Auth::guard('user')->user()->id,
            $request->judul,
            $request->bahan_ajar_jenis,
            $request->mata_kuliah,
            $request->program_studi,
            $request->semester,
            $request->tanggal_terbit,
            $request->deskripsi,
            $fileBahan,
            $request->link_bahan,
            $request->bahan_ajar_status_penggunaan,
            now(),
        ]);
    }

    /**
     * @method updateDataBahanAjarDomain
     * @param $request
     * @param $id
     * @param string $fileBahan
     * @return void
     */

    public function updateDataBahanAjarDomain($id, $request, string $fileBahan): void
    {
        DB::update('UPDATE bahan_ajar SET
            users_id = ?,
            judul = ?,
            bahan_ajar_jenis = ?,
            mata_kuliah = ?,
            program_studi = ?,
            semester = ?,
            tanggal_terbit = ?,
            deskripsi = ?,
            file_bahan = ?,
            link_bahan = ?,
            bahan_ajar_status_penggunaan = ?,
            updated_at = ?
            WHERE id = ?', [
            Auth::guard('user')->user()->id,
            $request->judul,
            $request->bahan_ajar_jenis,
            $request->mata_kuliah,
            $request->program_studi,
            $request->semester,
            $request->tanggal_terbit,
            $request->deskripsi,
            $fileBahan,
            $request->link_bahan,
            $request->bahan_ajar_status_penggunaan,
            now(),
            $id
        ]);
    }

    /**
     * @method deleteDataBahanAjarDomain
     * @param $id
     * @return void
     */

    public function deleteDataBahanAjarDomain($id): void
    {
        DB::delete('DELETE FROM bahan_ajar WHERE id = ?', [$id]);
    }
}
