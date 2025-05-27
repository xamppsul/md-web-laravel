<?php

namespace App\Src\Domain\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ListPublikasiDomain
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
     * feature: ListPublikasi
    /**=========================================================================================================
     */
    /**
     * @method getAllListPublikasiDomain
     * @param $request
     * @return array
     */
    public function getAllListPublikasiDomain(
        $request
    ): array {
        return DB::select('
            SELECT list_publikasi.*,
                list_publikasi_jenis.name AS list_publikasi_jenis_name,
                list_publikasi_status.name AS list_publikasi_status_name,
                users.name AS dosen_name
            FROM list_publikasi
                INNER JOIN list_publikasi_jenis ON list_publikasi.list_publikasi_jenis = list_publikasi_jenis.id
                INNER JOIN list_publikasi_status ON list_publikasi.list_publikasi_status = list_publikasi_status.id
                INNER JOIN users ON list_publikasi.users_id = users.id
            WHERE list_publikasi.list_publikasi_jenis LIKE ?
                AND list_publikasi.list_publikasi_status LIKE ?
                AND list_publikasi.users_id = ?
            ORDER BY list_publikasi.id DESC
        ', [
            "%$request->list_publikasi_jenis%",
            "%$request->list_publikasi_status%",
            Auth::guard('user')->user()->id
        ]);
    }

    /**
     * @method getDetailListPublikasiDomain
     * @param $id
     * @return array
     */
    public function getDetailListPublikasiDomain($id): array
    {
        return DB::select('
            SELECT list_publikasi.*,
                list_publikasi_jenis.name AS list_publikasi_jenis_name,
                list_publikasi_status.name AS list_publikasi_status_name
            FROM list_publikasi
                INNER JOIN list_publikasi_jenis ON list_publikasi.list_publikasi_jenis = list_publikasi_jenis.id
                INNER JOIN list_publikasi_status ON list_publikasi.list_publikasi_status = list_publikasi_status.id
            WHERE list_publikasi.id = ?
                AND list_publikasi.users_id = ?
        ', [
            $id,
            Auth::guard('user')->user()->id
        ]);
    }

    /**
     * @method getJenisListPublikasiDomain
     * @return array
     */
    public function getJenisListPublikasiDomain(): array
    {
        return DB::select('SELECT * FROM list_publikasi_jenis');
    }

    /**
     * @method getStatusListPublikasiDomain
     * @return array
     */
    public function getStatusListPublikasiDomain(): array
    {
        return DB::select('SELECT * FROM list_publikasi_status');
    }

    /**
     * @method postDataListPublikasiDomain
     * @param $request
     * @param string $file_publikasi
     * @return void
     */
    public function postDataListPublikasiDomain($request, string $file_publikasi): void
    {
        DB::insert('insert into list_publikasi
            (users_id,
            judul_publikasi,
            list_publikasi_jenis,
            nama_jurnal,
            volume,
            nomor,
            tahun_terbit,
            tanggal_terbit,
            penulis_lain,
            link_publikasi,
            file_publikasi,
            doi,
            list_publikasi_status,
            keterangan,
            created_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            Auth::guard('user')->user()->id,
            $request->judul_publikasi,
            $request->list_publikasi_jenis,
            $request->nama_jurnal,
            $request->volume,
            $request->nomor,
            $request->tahun_terbit,
            $request->tanggal_terbit,
            $request->penulis_lain,
            $request->link_publikasi,
            $file_publikasi,
            $request->doi,
            $request->list_publikasi_status,
            $request->keterangan,
            now(),
        ]);
    }

    /**
     * @method updateDataListPublikasiDomain
     * @param $request
     * @param $id
     * @param string $file_publikasi
     * @return void
     */

    public function updateDataListPublikasiDomain($id, $request, string $file_publikasi): void
    {
        DB::update('UPDATE list_publikasi SET
            users_id = ?,
            judul_publikasi = ?,
            list_publikasi_jenis = ?,
            nama_jurnal = ?,
            volume = ?,
            nomor = ?,
            tahun_terbit = ?,
            tanggal_terbit = ?,
            penulis_lain = ?,
            link_publikasi = ?,
            file_publikasi = ?,
            doi = ?,
            list_publikasi_status = ?,
            keterangan = ?,
            updated_at = ?
            WHERE id = ?', [
            Auth::guard('user')->user()->id,
            $request->judul_publikasi,
            $request->list_publikasi_jenis,
            $request->nama_jurnal,
            $request->volume,
            $request->nomor,
            $request->tahun_terbit,
            $request->tanggal_terbit,
            $request->penulis_lain,
            $request->link_publikasi,
            $file_publikasi,
            $request->doi,
            $request->list_publikasi_status,
            $request->keterangan,
            now(),
            $id
        ]);
    }

    /**
     * @method deleteDataListPublikasiDomain
     * @param $id
     * @return void
     */

    public function deleteDataListPublikasiDomain($id): void
    {
        DB::delete('DELETE FROM list_publikasi WHERE id = ?', [$id]);
    }
}
