<?php

namespace App\Src\Domain\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenelitianDomain
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
     * @method getAllPenelitianDomain
     * @param $request
     * @return array
     */
    public function getAllPenelitianDomain(
        $request
    ): array {
        return DB::select('
            SELECT penelitian.*,
                penelitian_sumber_dana.name AS penelitian_sumber_dana_name,
                penelitian_status.name AS penelitian_status_name,
                users.name AS dosen_name
            FROM penelitian
                INNER JOIN penelitian_sumber_dana ON penelitian.penelitian_sumber_dana = penelitian_sumber_dana.id
                INNER JOIN penelitian_status ON penelitian.penelitian_status = penelitian_status.id
                INNER JOIN users ON penelitian.users_id = users.id
            WHERE penelitian.penelitian_status LIKE ?
                AND penelitian.penelitian_sumber_dana LIKE ?
                AND penelitian.users_id = ?
            ORDER BY penelitian.id DESC
        ', [
            "%$request->penelitian_status%",
            "%$request->penelitian_sumber_dana%",
            Auth::guard('user')->user()->id
        ]);
    }

    /**
     * @method getDetailPenelitianDomain
     * @param $id
     * @return array
     */
    public function getDetailPenelitianDomain($id): array
    {
        return DB::select('
            SELECT penelitian.*,
                penelitian_sumber_dana.name AS penelitian_sumber_dana_name,
                penelitian_status.name AS penelitian_status_name
            FROM penelitian
                INNER JOIN penelitian_sumber_dana ON penelitian.penelitian_sumber_dana = penelitian_sumber_dana.id
                INNER JOIN penelitian_status ON penelitian.penelitian_status = penelitian_status.id
            WHERE penelitian.id = ?
                AND penelitian.users_id = ?
        ', [
            $id,
            Auth::guard('user')->user()->id
        ]);
    }

    /**
     * @method getSumberDanaPenelitianDomain
     * @return array
     */
    public function getSumberDanaPenelitianDomain(): array
    {
        return DB::select('SELECT * FROM penelitian_sumber_dana');
    }

    /**
     * @method getStatusPenelitianDomain
     * @return array
     */
    public function getStatusPenelitianDomain(): array
    {
        return DB::select('SELECT * FROM penelitian_status');
    }

    /**
     * @method postDataPenelitianDomain
     * @param $request
     * @param string $fileLaporanAkhirPenelitian
     * @return void
     */
    public function postDataPenelitianDomain($request, string $fileLaporanAkhirPenelitian): void
    {
        DB::insert('insert into penelitian
            (users_id,
            judul,
            bidang_ilmu,
            tahun,
            tgl_mulai,
            tgl_selesai,
            penelitian_sumber_dana,
            jumlah_dana,
            anggota_tim,
            laporan_akhir,
            penelitian_status,
            catatan,
            created_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            Auth::guard('user')->user()->id,
            $request->judul,
            $request->bidang_ilmu,
            $request->tahun,
            $request->tgl_mulai,
            $request->tgl_selesai,
            $request->penelitian_sumber_dana,
            $request->jumlah_dana,
            $request->anggota_tim,
            $fileLaporanAkhirPenelitian,
            $request->penelitian_status,
            $request->catatan,
            now(),
        ]);
    }

    /**
     * @method updateDataPenelitianDomain
     * @param $request
     * @param $id
     * @param string $fileLaporanAkhirPenelitian
     * @return void
     */

    public function updateDataPenelitianDomain($id, $request, string $fileLaporanAkhirPenelitian): void
    {
        DB::update('UPDATE penelitian SET 
            users_id = ?,
            judul = ?,
            bidang_ilmu = ?,
            tahun = ?,
            tgl_mulai = ?,
            tgl_selesai = ?,
            penelitian_sumber_dana = ?,
            jumlah_dana = ?,
            anggota_tim = ?,
            laporan_akhir = ?,
            penelitian_status = ?,
            catatan = ?,
            updated_at = ?
            WHERE id = ?', [
            Auth::guard('user')->user()->id,
            $request->judul,
            $request->bidang_ilmu,
            $request->tahun,
            $request->tgl_mulai,
            $request->tgl_selesai,
            $request->penelitian_sumber_dana,
            $request->jumlah_dana,
            $request->anggota_tim,
            $fileLaporanAkhirPenelitian,
            $request->penelitian_status,
            $request->catatan,
            now(),
            $id
        ]);
    }

    /**
     * @method deleteDataPenelitianDomain
     * @param $id
     * @return void
     */

    public function deleteDataPenelitianDomain($id): void
    {
        DB::delete('DELETE FROM penelitian WHERE id = ?', [$id]);
    }
}
