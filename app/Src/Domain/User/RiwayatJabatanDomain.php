<?php

namespace App\Src\Domain\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RiwayatJabatanDomain
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
     * @method getAllRiwayatJabatanDomain
     * @param $request
     * @return array
     */
    public function getAllRiwayatJabatanDomain(
        $request
    ): array {
        return DB::select('
            SELECT riwayat_jabatan.*,
                riwayat_jabatan_jenis.name AS riwayat_jabatan_jenis_name,
                riwayat_jabatan_status.name AS riwayat_jabatan_status_name,
                users.name AS dosen_name,
                users.id AS dosen_id
            FROM riwayat_jabatan
                INNER JOIN riwayat_jabatan_jenis ON riwayat_jabatan.riwayat_jabatan_jenis = riwayat_jabatan_jenis.id
                INNER JOIN riwayat_jabatan_status ON riwayat_jabatan.riwayat_jabatan_status = riwayat_jabatan_status.id
                INNER JOIN users ON riwayat_jabatan.users_id = users.id
            WHERE riwayat_jabatan.riwayat_jabatan_jenis LIKE ?
                AND riwayat_jabatan.riwayat_jabatan_status LIKE ?
                AND riwayat_jabatan.users_id = ?
            ORDER BY riwayat_jabatan.riwayat_jabatan_status ASC
        ', [
            "%$request->riwayat_jabatan_jenis%",
            "%$request->riwayat_jabatan_status%",
            Auth::guard('user')->user()->id
        ]);
    }

    /**
     * @method getDetailRiwayatJabatanDomain
     * @param $id
     * @return array
     */
    public function getDetailRiwayatJabatanDomain($id): array
    {
        return DB::select('
            SELECT riwayat_jabatan.*,
                riwayat_jabatan_jenis.name AS riwayat_jabatan_jenis_name,
                riwayat_jabatan_status.name AS riwayat_jabatan_status_name
            FROM riwayat_jabatan
                INNER JOIN riwayat_jabatan_jenis ON riwayat_jabatan.riwayat_jabatan_jenis = riwayat_jabatan_jenis.id
                INNER JOIN riwayat_jabatan_status ON riwayat_jabatan.riwayat_jabatan_status = riwayat_jabatan_status.id
            WHERE riwayat_jabatan.id = ?
                AND riwayat_jabatan.users_id = ?
        ', [
            $id,
            Auth::guard('user')->user()->id
        ]);
    }

    /**
     * @method getJenisRiwayatJabatanDomain
     * @return array
     */
    public function getJenisRiwayatJabatanDomain(): array
    {
        return DB::select('SELECT * FROM riwayat_jabatan_jenis');
    }

    /**
     * @method getStatusRiwayatJabatanDomain
     * @return array
     */
    public function getStatusRiwayatJabatanDomain(): array
    {
        return DB::select('SELECT * FROM riwayat_jabatan_status');
    }

    /**
     * @method postDataRiwayatJabatanDomain
     * @param $request
     * @param string $fileDocumentSkRiwayatJabatan
     * @return void
     */
    public function postDataRiwayatJabatanDomain($request, string $fileDocumentSkRiwayatJabatan): void
    {
        DB::insert('insert into riwayat_jabatan
            (users_id,
            nama_jabatan,
            riwayat_jabatan_jenis,
            unit_kerja,
            no_sk_jabatan,
            tanggal_sk,
            tanggal_mulai,
            tanggal_selesai,
            dokumen_sk,
            riwayat_jabatan_status,
            keterangan,
            created_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            Auth::guard('user')->user()->id,
            $request->nama_jabatan,
            $request->riwayat_jabatan_jenis,
            $request->unit_kerja,
            $request->no_sk_jabatan,
            $request->tanggal_sk,
            $request->tanggal_mulai,
            //tanggal selesai menjabat optional
            !empty($request->tanggal_selesai) ? $request->tanggal_selesai : null,
            $fileDocumentSkRiwayatJabatan,
            $request->riwayat_jabatan_status,
            $request->keterangan,
            now(),
        ]);
    }

    /**
     * @method updateDataRiwayatJabatanDomain
     * @param $request
     * @param $id
     * @param string $fileDocumentSkRiwayatJabatan
     * @return void
     */

    public function updateDataRiwayatJabatanDomain($id, $request, string $fileDocumentSkRiwayatJabatan): void
    {
        $data = $this->getDetailRiwayatJabatanDomain($id)[0];
        DB::update('UPDATE riwayat_jabatan SET
            users_id = ?,
            nama_jabatan = ?,
            riwayat_jabatan_jenis = ?,
            unit_kerja = ?,
            no_sk_jabatan = ?,
            tanggal_sk = ?,
            tanggal_mulai = ?,
            tanggal_selesai = ?,
            dokumen_sk = ?,
            riwayat_jabatan_status = ?,
            keterangan = ?,
            updated_at = ?
            WHERE id = ?', [
            Auth::guard('user')->user()->id,
            $request->nama_jabatan,
            $request->riwayat_jabatan_jenis,
            $request->unit_kerja,
            $request->no_sk_jabatan,
            $request->tanggal_sk,
            $request->tanggal_mulai,
            //tanggal selesai menjabat optional
            !empty($request->tanggal_selesai) ? $request->tanggal_selesai : null,
            !empty($request->dokumen_sk) ? $fileDocumentSkRiwayatJabatan : $data->dokumen_sk, //default is current data if isn't request upload document sk
            $request->riwayat_jabatan_status,
            $request->keterangan,
            now(),
            $id
        ]);
    }

    /**
     * @method deleteDataRiwayatJabatanDomain
     * @param $id
     * @return void
     */

    public function deleteDataRiwayatJabatanDomain($id): void
    {
        DB::delete('DELETE FROM riwayat_jabatan WHERE id = ?', [$id]);
    }
}
