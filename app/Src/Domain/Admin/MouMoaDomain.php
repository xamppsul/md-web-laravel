<?php

namespace App\Src\Domain\Admin;

use Illuminate\Support\Facades\DB;

class MouMoaDomain
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
     * feature: master data mou moa
    /**=========================================================================================================
     */
    /**
     * @method getAllMouMoaDomain
     * @param $request
     * @return array
     */
    public function getAllMouMoaDomain(
        $request
    ): array {
        return DB::select('
            SELECT mou_moa.*, 
                mou_moa_bidang_kerjasama.name AS mou_moa_bidang_kerjasama_name, 
                mou_moa_klasifikasi.name AS mou_moa_klasifikasi_name,
                mou_moa_status.name AS mou_moa_status_name
            FROM mou_moa
                INNER JOIN mou_moa_bidang_kerjasama ON mou_moa.mou_moa_bidang_kerjasama = mou_moa_bidang_kerjasama.id
                INNER JOIN mou_moa_klasifikasi ON mou_moa.mou_moa_klasifikasi = mou_moa_klasifikasi.id
                INNER JOIN mou_moa_status ON mou_moa.mou_moa_status = mou_moa_status.id
            WHERE mou_moa.jenis_dokumen LIKE ?
                AND mou_moa.nama_mitra LIKE ?
                AND mou_moa.mou_moa_klasifikasi LIKE ?
                AND mou_moa.mou_moa_status LIKE ?
                AND mou_moa.mou_moa_bidang_kerjasama LIKE ?
                AND mou_moa.users_id LIKE ?
            ORDER BY mou_moa.nomor_dokumen DESC
        ', [
            "%$request->jenis_dokumen%",
            "%$request->nama_mitra%",
            "%$request->mou_moa_klasifikasi%",
            "%$request->mou_moa_status%",
            "%$request->mou_moa_bidang_kerjasama%",
            "%$request->users_id%"
        ]);
    }

    /**
     * @method getDetailMouMoaDomain
     * @param $id
     * @return array
     */
    public function getDetailMouMoaDomain($id): array
    {
        return DB::select('
            SELECT mou_moa.*, 
                mou_moa_bidang_kerjasama.name AS mou_moa_bidang_kerjasama_name, 
                mou_moa_klasifikasi.name AS mou_moa_klasifikasi_name,
                mou_moa_status.name AS mou_moa_status_name
            FROM mou_moa
                INNER JOIN mou_moa_bidang_kerjasama ON mou_moa.mou_moa_bidang_kerjasama = mou_moa_bidang_kerjasama.id
                INNER JOIN mou_moa_klasifikasi ON mou_moa.mou_moa_klasifikasi = mou_moa_klasifikasi.id
                INNER JOIN mou_moa_status ON mou_moa.mou_moa_status = mou_moa_status.id
            WHERE mou_moa.id = ?
        ', [$id]);
    }

    /**
     * @method getBidangKerjaSamaMouMoaDomain
     * @return array
     */
    public function getBidangKerjaSamaMouMoaDomain(): array
    {
        return DB::select('SELECT * FROM mou_moa_bidang_kerjasama');
    }

    /**
     * @method getKlasifikasiMouMoaDomain
     * @return array
     */
    public function getKlasifikasiMouMoaDomain(): array
    {
        return DB::select('SELECT * FROM mou_moa_klasifikasi');
    }

    /**
     * @method getStatusMouMoaDomain
     * @return array
     */
    public function getStatusMouMoaDomain(): array
    {
        return DB::select('SELECT * FROM mou_moa_status');
    }

    /**
     * @method getUserByRoleFaculty
     * @return array
     */

    public function getUserByRoleFaculty(): array
    {
        return DB::select('SELECT * FROM users WHERE roles_id = 3'); //query user with role faculty
    }

    /**
     * @method postDataMouMoaDomain
     * @param $request
     * @return void
     */
    public function postDataMouMoaDomain($request): void
    {
        DB::insert('insert into mou_moa 
            (nomor_dokumen,
            jenis_dokumen,
            nama_mitra,
            judul_kerjasama,
            mou_moa_klasifikasi,
            tanggal_mulai,
            tanggal_akhir,
            mou_moa_status,
            mou_moa_bidang_kerjasama,
            users_id,
            dokumen_pendukung,
            keterangan_tambahan,
            created_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $request->nomor_dokumen,
            $request->jenis_dokumen,
            $request->nama_mitra,
            $request->judul_kerjasama,
            $request->mou_moa_klasifikasi,
            $request->tanggal_mulai,
            $request->tanggal_akhir,
            $request->mou_moa_status,
            $request->mou_moa_bidang_kerjasama,
            $request->users_id,
            $request->dokumen_pendukung,
            $request->keterangan_tambahan,
            now(),
        ]);
    }

    /**
     * @method updateDataMouMoaDomain
     * @param $request
     * @param $id
     * @return void
     */

    public function updateDataMouMoaDomain($id, $request): void
    {
        DB::update('UPDATE mou_moa SET 
            nomor_dokumen = ?,
            jenis_dokumen = ?,
            nama_mitra = ?,
            judul_kerjasama = ?,
            mou_moa_klasifikasi = ?,
            tanggal_mulai = ?,
            tanggal_akhir = ?,
            mou_moa_status = ?,
            mou_moa_bidang_kerjasama = ?,
            users_id = ?,
            dokumen_pendukung = ?,
            keterangan_tambahan = ?,
            updated_at = ?
            WHERE id = ?', [
            $request->nomor_dokumen,
            $request->jenis_dokumen,
            $request->nama_mitra,
            $request->judul_kerjasama,
            $request->mou_moa_klasifikasi,
            $request->tanggal_mulai,
            $request->tanggal_akhir,
            $request->mou_moa_status,
            $request->mou_moa_bidang_kerjasama,
            $request->users_id,
            $request->dokumen_pendukung,
            $request->keterangan_tambahan,
            now(),
            $id
        ]);
    }

    /**
     * @method deleteDataMouMoaDomain
     * @param $id
     * @return void
     */

    public function deleteDataMouMoaDomain($id): void
    {
        DB::delete('DELETE FROM mou_moa WHERE id = ?', [$id]);
    }
}
