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
                mou_moa_status.name AS mou_moa_status_name,
                users.name AS penanggung_jawab_name,
                users.id AS penanggung_jawab_id,
                mou_moa_jenis_dokumen.name AS mou_moa_jenis_dokumen_name
            FROM mou_moa
                INNER JOIN mou_moa_bidang_kerjasama ON mou_moa.mou_moa_bidang_kerjasama = mou_moa_bidang_kerjasama.id
                INNER JOIN mou_moa_klasifikasi ON mou_moa.mou_moa_klasifikasi = mou_moa_klasifikasi.id
                INNER JOIN mou_moa_status ON mou_moa.mou_moa_status = mou_moa_status.id
                INNER JOIN users ON mou_moa.users_id = users.id
                INNER JOIN mou_moa_jenis_dokumen ON mou_moa.mou_moa_jenis_dokumen = mou_moa_jenis_dokumen.id
            WHERE mou_moa.mou_moa_jenis_dokumen LIKE ?
                AND mou_moa.nama_mitra LIKE ?
                AND mou_moa.mou_moa_klasifikasi LIKE ?
                AND mou_moa.mou_moa_status LIKE ?
                AND mou_moa.mou_moa_bidang_kerjasama LIKE ?
                AND mou_moa.users_id LIKE ?
            ORDER BY mou_moa.nomor_dokumen DESC
        ', [
            "%$request->mou_moa_jenis_dokumen%",
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
                mou_moa_status.name AS mou_moa_status_name,
                users.id AS penanggung_jawab_id,
                users.name AS penanggung_jawab_name,
                mou_moa_jenis_dokumen.name AS mou_moa_jenis_dokumen_name
            FROM mou_moa
                INNER JOIN mou_moa_bidang_kerjasama ON mou_moa.mou_moa_bidang_kerjasama = mou_moa_bidang_kerjasama.id
                INNER JOIN mou_moa_klasifikasi ON mou_moa.mou_moa_klasifikasi = mou_moa_klasifikasi.id
                INNER JOIN mou_moa_status ON mou_moa.mou_moa_status = mou_moa_status.id
                INNER JOIN users ON mou_moa.users_id = users.id
                INNER JOIN mou_moa_jenis_dokumen ON mou_moa.mou_moa_jenis_dokumen = mou_moa_jenis_dokumen.id
            WHERE mou_moa.id = ?
        ', [$id]);
    }
    /**
     * @method getJenisDokumenMouMoaDomain
     * @return array
     */

    public function getJenisDokumenMouMoaDomain(): array
    {
        return DB::select('SELECT * FROM mou_moa_jenis_dokumen');
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
     * @param $filePendukung
     * @return void
     */
    public function postDataMouMoaDomain($request, $filePendukung): void
    {
        DB::insert('insert into mou_moa 
            (nomor_dokumen,
            mou_moa_jenis_dokumen,
            nama_mitra,
            judul_kerjasama,
            mou_moa_klasifikasi,
            tahun,
            tanggal_mulai,
            tanggal_akhir,
            mou_moa_status,
            mou_moa_bidang_kerjasama,
            users_id,
            dokumen_pendukung,
            keterangan_tambahan,
            created_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $request->nomor_dokumen,
            $request->mou_moa_jenis_dokumen,
            $request->nama_mitra,
            $request->judul_kerjasama,
            $request->mou_moa_klasifikasi,
            $request->tahun,
            $request->tanggal_mulai,
            $request->tanggal_akhir,
            $request->mou_moa_status,
            $request->mou_moa_bidang_kerjasama,
            $request->users_id,
            $filePendukung,
            $request->keterangan_tambahan,
            now(),
        ]);
    }

    /**
     * @method updateDataMouMoaDomain
     * @param $request
     * @param int $id
     * @param string $filePendukung
     * @return void
     */

    public function updateDataMouMoaDomain(int $id, $request, string $filePendukung): void
    {
        $data = $this->getDetailMouMoaDomain($id)[0];
        DB::update('UPDATE mou_moa SET 
            nomor_dokumen = ?,
            mou_moa_jenis_dokumen = ?,
            nama_mitra = ?,
            judul_kerjasama = ?,
            mou_moa_klasifikasi = ?,
            tahun = ?,
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
            $request->mou_moa_jenis_dokumen,
            $request->nama_mitra,
            $request->judul_kerjasama,
            $request->mou_moa_klasifikasi,
            $request->tahun,
            $request->tanggal_mulai,
            $request->tanggal_akhir,
            $request->mou_moa_status,
            $request->mou_moa_bidang_kerjasama,
            $request->users_id,
            !empty($request->dokumen_pendukung) ? $filePendukung : $data->dokumen_pendukung,
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
