<?php

namespace App\Src\Domain\Admin;

use Illuminate\Support\Facades\DB;

class KegiatanDomain
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
     * @method getAllKegiatanDomain
     * @param $request
     * @return array
     */
    public function getAllKegiatanDomain(
        $request
    ): array {
        return DB::select('
            SELECT kegiatan.*, 
                kegiatan_jenis.name AS kegiatan_jenis_name, 
                kegiatan_status.name AS kegiatan_status_name,
                users.id AS faculty_id,
                users.name AS faculty_name
            FROM kegiatan
                INNER JOIN kegiatan_jenis ON kegiatan.kegiatan_jenis = kegiatan_jenis.id
                INNER JOIN kegiatan_status ON kegiatan.kegiatan_status = kegiatan_status.id
                INNER JOIN users ON kegiatan.users_id = users.id
            WHERE kegiatan.tempat_lokasi LIKE ?
                AND kegiatan.tanggal_kegiatan LIKE ?
                AND kegiatan.kegiatan_jenis LIKE ?
                AND kegiatan.nama_kegiatan LIKE ?
            ORDER BY kegiatan.id DESC
        ', [
            "%$request->tempat_lokasi%",
            "%$request->tanggal_kegiatan%",
            "%$request->kegiatan_jenis%",
            "%$request->nama_kegiatan%"
        ]);
    }

    /**
     * @method getDetailKegiatanDomain
     * @param $id
     * @return array
     */
    public function getDetailKegiatanDomain($id): array
    {
        return DB::select('
            SELECT kegiatan.*, 
                kegiatan_jenis.name AS kegiatan_jenis_name, 
                kegiatan_status.name AS kegiatan_status_name,
                users.id AS faculty_id,
                users.name AS faculty_name
            FROM kegiatan
                INNER JOIN kegiatan_jenis ON kegiatan.kegiatan_jenis = kegiatan_jenis.id
                INNER JOIN kegiatan_status ON kegiatan.kegiatan_status = kegiatan_status.id
                INNER JOIN users ON kegiatan.users_id = users.id
            WHERE kegiatan.id = ?
        ', [$id]);
    }
    /**
     * @method getJenisKegiatan
     * @return array
     */

    public function getJenisKegiatan(): array
    {
        return DB::select('SELECT * FROM kegiatan_jenis');
    }

    /**
     * @method getStatusKegiatan
     * @return array
     */
    public function getStatusKegiatan(): array
    {
        return DB::select('SELECT * FROM kegiatan_status');
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
     * @method postDataKegiatanDomain
     * @param $request
     * @param $fileDaftarHadir
     * @param $fileKegiatan
     * @return void
     */
    public function postDataKegiatanDomain($request, $fileDaftarHadir, $fileKegiatan): void
    {
        DB::insert('insert into kegiatan 
            (users_id,
            nama_kegiatan,
            kegiatan_jenis,
            tahun,
            tanggal_kegiatan,
            tempat_lokasi,
            penyelenggara,
            jumlah_peserta,
            file_daftar_hadir,
            file_kegiatan,
            kegiatan_status,
            keterangan,
            created_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $request->users_id,
            $request->nama_kegiatan,
            $request->kegiatan_jenis,
            $request->tahun,
            $request->tanggal_kegiatan,
            $request->tempat_lokasi,
            $request->penyelenggara,
            $request->jumlah_peserta,
            $fileDaftarHadir,
            $fileKegiatan,
            $request->kegiatan_status,
            $request->keterangan,
            now()
        ]);
    }

    /**
     * @method updateDataKegiatanDomain
     * @param $request
     * @param int $id
     * @param string $fileDaftarHadir
     * @param string $fileKegiatan
     * @return void
     */

    public function updateDataKegiatanDomain(int $id, $request, string $fileDaftarHadir, string $fileKegiatan): void
    {
        $data = $this->getDetailKegiatanDomain($id)[0];
        DB::update('UPDATE kegiatan SET 
            users_id = ?,
            nama_kegiatan = ?,
            kegiatan_jenis = ?,
            tahun = ?,
            tanggal_kegiatan = ?,
            tempat_lokasi = ?,
            penyelenggara = ?,
            jumlah_peserta = ?,
            file_daftar_hadir = ?,
            file_kegiatan = ?,
            kegiatan_status = ?,
            keterangan = ?,
            updated_at = ?
            WHERE id = ?', [
            $request->users_id,
            $request->nama_kegiatan,
            $request->kegiatan_jenis,
            $request->tahun,
            $request->tanggal_kegiatan,
            $request->tempat_lokasi,
            $request->penyelenggara,
            $request->jumlah_peserta,
            !empty($request->file_daftar_hadir) ? $fileDaftarHadir : $data->file_daftar_hadir,
            !empty($request->file_kegiatan) ? $fileKegiatan : $data->file_kegiatan,
            $request->kegiatan_status,
            $request->keterangan,
            now(),
            $id
        ]);
    }

    /**
     * @method deleteDataKegiatanDomain
     * @param $id
     * @return void
     */

    public function deleteDataKegiatanDomain($id): void
    {
        DB::delete('DELETE FROM kegiatan WHERE id = ?', [$id]);
    }
}
