<?php

namespace App\Src\Domain\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengabdianDomain
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
     * @method getAllPengabdianDomain
     * @param $request
     * @return array
     */
    public function getAllPengabdianDomain(
        $request
    ): array {
        return DB::select('
            SELECT pengabdian.*,
                pengabdian_bidang.name AS pengabdian_bidang_name,
                pengabdian_sumber_dana.name AS pengabdian_sumber_dana_name,
                pengabdian_status.name AS pengabdian_status_name
            FROM pengabdian
                INNER JOIN pengabdian_bidang ON pengabdian.pengabdian_bidang = pengabdian_bidang.id
                INNER JOIN pengabdian_sumber_dana ON pengabdian.pengabdian_sumber_dana = pengabdian_sumber_dana.id
                INNER JOIN pengabdian_status ON pengabdian.pengabdian_status = pengabdian_status.id
            WHERE pengabdian.pengabdian_bidang LIKE ?
                AND pengabdian.pengabdian_sumber_dana LIKE ?
                AND pengabdian.pengabdian_status LIKE ?
                AND pengabdian.users_id = ?
            ORDER BY pengabdian.id DESC
        ', [
            "%$request->pengabdian_bidang%",
            "%$request->pengabdian_sumber_dana%",
            "%$request->pengabdian_status%",
            Auth::guard('user')->user()->id
        ]);
    }

    /**
     * @method getDetailPengabdianDomain
     * @param $id
     * @return array
     */
    public function getDetailPengabdianDomain($id): array
    {
        return DB::select('
            SELECT pengabdian.*,
                pengabdian_bidang.name AS pengabdian_bidang_name,
                pengabdian_sumber_dana.name AS pengabdian_sumber_dana_name,
                pengabdian_status.name AS pengabdian_status_name
            FROM pengabdian
                INNER JOIN pengabdian_bidang ON pengabdian.pengabdian_bidang = pengabdian_bidang.id
                INNER JOIN pengabdian_sumber_dana ON pengabdian.pengabdian_sumber_dana = pengabdian_sumber_dana.id
                INNER JOIN pengabdian_status ON pengabdian.pengabdian_status = pengabdian_status.id
            WHERE pengabdian.id = ?
                AND pengabdian.users_id = ?
        ', [
            $id,
            Auth::guard('user')->user()->id
        ]);
    }

    /**
     * @method getBidangPengabdianDomain
     * @return array
     */
    public function getBidangPengabdianDomain(): array
    {
        return DB::select('SELECT * FROM pengabdian_bidang');
    }

    /**
     * @method getStatusPengabdianDomain
     * @return array
     */
    public function getStatusPengabdianDomain(): array
    {
        return DB::select('SELECT * FROM pengabdian_status');
    }

    /**
     * @method getSumberDanaPengabdianDomain
     * @return array
     */
    public function getSumberDanaPengabdianDomain(): array
    {
        return DB::select('SELECT * FROM pengabdian_sumber_dana');
    }

    /**
     * @method postDataPengabdianDomain
     * @param $request
     * @param string $fileLaporanPengabdian
     * @param string $fileDokumentasiPengabdian
     * @return void
     */
    public function postDataPengabdianDomain($request, string $fileLaporanPengabdian, string $fileDokumentasiPengabdian): void
    {
        DB::insert('insert into pengabdian
            (users_id,
            judul,
            pengabdian_bidang,
            pengabdian_sumber_dana,
            tahun,
            tgl_mulai,
            tgl_selesai,
            lokasi,
            jumlah_peserta,
            laporan_pengabdian,
            dokumentasi,
            pengabdian_status,
            catatan,
            created_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            Auth::guard('user')->user()->id,
            $request->judul,
            $request->pengabdian_bidang,
            $request->pengabdian_sumber_dana,
            $request->tahun,
            $request->tgl_mulai,
            $request->tgl_selesai,
            $request->lokasi,
            $request->jumlah_peserta,
            $fileLaporanPengabdian,
            $fileDokumentasiPengabdian,
            $request->pengabdian_status,
            $request->catatan,
            now(),
        ]);
    }

    /**
     * @method updateDataPengabdianDomain
     * @param $request
     * @param $id
     * @param string $fileLaporanPengabdian
     * @param string $fileDokumentasiPengabdian
     * @return void
     */

    public function updateDataPengabdianDomain($id, $request, string $fileLaporanPengabdian, string $fileDokumentasiPengabdian): void
    {
        DB::update('UPDATE pengabdian SET 
            users_id = ?,
            judul = ?,
            pengabdian_bidang = ?,
            pengabdian_sumber_dana = ?,
            tahun = ?,
            tgl_mulai = ?,
            tgl_selesai = ?,
            lokasi = ?,
            jumlah_peserta = ?,
            laporan_pengabdian = ?,
            dokumentasi = ?,
            pengabdian_status = ?,
            catatan = ?,
            updated_at = ?
            WHERE id = ?', [
            Auth::guard('user')->user()->id,
            $request->judul,
            $request->pengabdian_bidang,
            $request->pengabdian_sumber_dana,
            $request->tahun,
            $request->tgl_mulai,
            $request->tgl_selesai,
            $request->lokasi,
            $request->jumlah_peserta,
            $fileLaporanPengabdian,
            $fileDokumentasiPengabdian,
            $request->pengabdian_status,
            $request->catatan,
            now(),
            $id
        ]);
    }

    /**
     * @method deleteDataPengabdianDomain
     * @param $id
     * @return void
     */

    public function deleteDataPengabdianDomain($id): void
    {
        DB::delete('DELETE FROM pengabdian WHERE id = ?', [$id]);
    }
}
