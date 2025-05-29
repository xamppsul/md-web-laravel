<?php

namespace App\Src\Domain\User;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthDomain
{
    /**
     * @method DomainLogInsert
     *  transaction data with log error to table log_errors
     */

    public function DomainLogInsert(
        string $message,
        string $route,
        string $path,
        string $type,
    ): void {
        DB::insert('insert into logs (message,route,path,type,created_at,updated_at) values (?, ?, ?, ?, ?, ?)', [$message, $route, $path, $type, now(), now()]);
    }

    /**
     * @method DomainInsertForgotPassword
     * @return void
     */
    public function DomainInsertForgotPassword(
        string $email,
        string $url,
        string $tokenResetPassword
    ): void {
        DB::insert('INSERT INTO password_reset_tokens (email,token,url,created_at,updated_at) values (?, ?, ?, ?, ?)', [$email, $tokenResetPassword, $url, now(), now()]);
    }

    /**
     * @method DomainValidateTokenResetPassword
     * @return array
     */
    public function DomainValidateTokenResetPassword(string $token): array
    {
        return DB::select("SELECT * FROM password_reset_tokens WHERE token = ?", [$token]);
    }

    /**
     * @method DomainChangePassword
     *  transaction with change password by email from reset password 
     * @return void
     */
    public function DomainChangePassword(
        string $email,
        string $new_password
    ): void {
        DB::update('UPDATE users SET password = ? WHERE email = ?', [Hash::make($new_password), $email]);
    }

    /**
     * @method DomainDeleteTokenResetPassword
     *  transaction with delete token reset password
     * @return void
     */
    public function DomainDeleteTokenResetPassword(string $token): void
    {
        DB::delete('DELETE FROM password_reset_tokens WHERE token = ?', [$token]);
    }

    /**
     * @method UserDashboardGetCountTotalBahanAjarDomain
     * @return array
     */
    public function UserDashboardGetCountTotalBahanAjarDomain(): array
    {
        return DB::select("SELECT COUNT(*) as total  FROM bahan_ajar");
    }

    /**
     * @method UserDashboardGetCountTotalPenelitianDomain
     * @return array
     */
    public function UserDashboardGetCountTotalPenelitianDomain(): array
    {
        return DB::select("SELECT COUNT(*) as total  FROM penelitian");
    }

    /**
     * @method UserDashboardGetCountTotalPengabdianDomain
     * @return array
     */
    public function UserDashboardGetCountTotalPengabdianDomain(): array
    {
        return DB::select("SELECT COUNT(*) as total  FROM pengabdian");
    }

    /**
     * @method GetUserProfileBySessionID
     * @param $users_id
     * @return array
     */

    public function GetUserProfileBySessionID($users_id): array
    {
        return DB::select("SELECT * FROM profile WHERE users_id = ?", [$users_id]);
    }

    /**
     * @method GetUserProfileStatusPerkawinan
     * @return array
     */

    public function GetUserProfileStatusPerkawinan(): array
    {
        return DB::select("SELECT * FROM profile_status_perkawinan");
    }

    /**
     * @method GetUserProfileStatusMengajar
     * @return array
     */

    public function GetUserProfileStatusMengajar(): array
    {
        return DB::select("SELECT * FROM profile_status_mengajar");
    }

    /**
     * @method GetUserProfileStatusIkatanKerja
     * @return array
     */

    public function GetUserProfileStatusIkatanKerja(): array
    {
        return DB::select("SELECT * FROM profile_status_ikatan_kerja");
    }

    /**
     * @method postDataProfileDomain
     * @param $request
     * @param int $users_id
     * @param string $profile_photo
     * @param string $profile_banner
     * @return void
     */
    public function postDataProfileDomain($request, int $users_id, string $profile_photo, string $profile_banner): void
    {
        DB::insert('insert into profile 
            (users_id,
            nidn,
            nip,
            nama_lengkap,
            gelar_depan,
            gelar_belakang,
            jenis_kelamin,
            tempat_lahir,
            tanggal_lahir,
            agama,
            profile_status_perkawinan,
            alamat,
            no_hp,
            pendidikan_terakhir,
            program_studi,
            fakultas,
            jabatan_akademik,
            jabatan_golongan,
            profile_status_ikatan_kerja,
            profile_status_mengajar,
            photo,
            photo_banner,
            created_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $users_id,
            !empty($request->nidn) ? $request->nidn :  null,
            !empty($request->nip) ? $request->nip : null,
            !empty($request->nama_lengkap) ? $request->nama_lengkap : null,
            !empty($request->gelar_depan) ? $request->gelar_depan : null,
            !empty($request->gelar_belakang) ? $request->gelar_belakang : null,
            !empty($request->jenis_kelamin) ? $request->jenis_kelamin : null,
            !empty($request->tempat_lahir) ? $request->tempat_lahir : null,
            !empty($request->tanggal_lahir) ? $request->tanggal_lahir : null,
            !empty($request->agama) ? $request->agama : null,
            !empty($request->profile_status_perkawinan) ? $request->profile_status_perkawinan : null,
            !empty($request->alamat) ? $request->alamat : null,
            !empty($request->no_hp) ? $request->no_hp : null,
            !empty($request->pendidikan_terakhir) ? $request->pendidikan_terakhir : null,
            !empty($request->program_studi) ? $request->program_studi : null,
            !empty($request->fakultas) ? $request->fakultas : null,
            !empty($request->jabatan_akademik) ? $request->jabatan_akademik : null,
            !empty($request->jabatan_golongan) ? $request->jabatan_golongan : null,
            !empty($request->profile_status_ikatan_kerja) ? $request->profile_status_ikatan_kerja : null,
            !empty($request->profile_status_mengajar) ? $request->profile_status_mengajar : null,
            !empty($request->photo) ? $profile_photo : null,
            !empty($request->photo_banner) ? $profile_banner : null,
            now(),
        ]);
    }

    /**
     * @method updateDataProfileDomain
     * @param int $users_id
     * @param string|bool $profile_photo
     * @param string|bool $profile_banner
     * @return void
     */

    public function updateDataProfileDomain($request, int $users_id, string|bool $profile_photo, string|bool $profile_banner): void
    {
        $data = $this->GetUserProfileBySessionID($users_id)[0];
        DB::update('UPDATE profile SET
            nidn = ?,
            nip = ?,
            nama_lengkap = ?,
            gelar_depan = ?,
            gelar_belakang = ?,
            jenis_kelamin = ?,
            tempat_lahir = ?,
            tanggal_lahir = ?,
            agama = ?,
            profile_status_perkawinan = ?,
            alamat = ?,
            no_hp = ?,
            pendidikan_terakhir = ?,
            program_studi = ?,
            fakultas = ?,
            jabatan_akademik = ?,
            jabatan_golongan = ?,
            profile_status_ikatan_kerja = ?,
            profile_status_mengajar = ?,
            photo = ?,
            photo_banner = ?, 
            updated_at = ?
            WHERE users_id = ?', [
            !empty($request->nidn) ? $request->nidn :  null,
            !empty($request->nip) ? $request->nip : null,
            !empty($request->nama_lengkap) ? $request->nama_lengkap : null,
            !empty($request->gelar_depan) ? $request->gelar_depan : null,
            !empty($request->gelar_belakang) ? $request->gelar_belakang : null,
            !empty($request->jenis_kelamin) ? $request->jenis_kelamin : null,
            !empty($request->tempat_lahir) ? $request->tempat_lahir : null,
            !empty($request->tanggal_lahir) ? $request->tanggal_lahir : null,
            !empty($request->agama) ? $request->agama : null,
            !empty($request->profile_status_perkawinan) ? $request->profile_status_perkawinan : null,
            !empty($request->alamat) ? $request->alamat : null,
            !empty($request->no_hp) ? $request->no_hp : null,
            !empty($request->pendidikan_terakhir) ? $request->pendidikan_terakhir : null,
            !empty($request->program_studi) ? $request->program_studi : null,
            !empty($request->fakultas) ? $request->fakultas : null,
            !empty($request->jabatan_akademik) ? $request->jabatan_akademik : null,
            !empty($request->jabatan_golongan) ? $request->jabatan_golongan : null,
            !empty($request->profile_status_ikatan_kerja) ? $request->profile_status_ikatan_kerja : null,
            !empty($request->profile_status_mengajar) ? $request->profile_status_mengajar : null,
            isset($request->photo) && $profile_photo != false ? $profile_photo : $data->photo, //kalo ada request ambil update photonya kalo gak ada keep photo lama
            isset($request->photo_banner) && $profile_banner != false ? $profile_banner : $data->photo_banner, //kalo ada request ambil update photo bannernya kalo gak ada keep photo banner lama
            now(),
            $users_id
        ]);
    }

    /**
     * @method getAllBahanAjarDomain
     * @return array
     */
    public function getAllBahanAjarDomain(): array
    {
        return DB::select('
            SELECT bahan_ajar.*,
                bahan_ajar_jenis.name AS bahan_ajar_jenis_name,
                bahan_ajar_status_penggunaan.name AS bahan_ajar_status_penggunaan_name
            FROM bahan_ajar
                INNER JOIN bahan_ajar_jenis ON bahan_ajar.bahan_ajar_jenis = bahan_ajar_jenis.id
                INNER JOIN bahan_ajar_status_penggunaan ON bahan_ajar.bahan_ajar_status_penggunaan = bahan_ajar_status_penggunaan.id
            WHERE bahan_ajar.users_id = ?
            ORDER BY bahan_ajar.id DESC
        ', [Auth::guard('user')->user()->id]);
    }

    /**
     * @method getAllRiwayatJabatanDomain
     * @return array
     */
    public function getAllRiwayatJabatanDomain(): array
    {
        return DB::select('
            SELECT riwayat_jabatan.*,
                riwayat_jabatan_jenis.name AS riwayat_jabatan_jenis_name,
                riwayat_jabatan_status.name AS riwayat_jabatan_status_name
            FROM riwayat_jabatan
                INNER JOIN riwayat_jabatan_jenis ON riwayat_jabatan.riwayat_jabatan_jenis = riwayat_jabatan_jenis.id
                INNER JOIN riwayat_jabatan_status ON riwayat_jabatan.riwayat_jabatan_status = riwayat_jabatan_status.id
            WHERE riwayat_jabatan.users_id = ?
            ORDER BY riwayat_jabatan.id DESC
        ', [Auth::guard('user')->user()->id]);
    }

    /**
     * @method getAllListPublikasiDomain
     * @return array
     */
    public function getAllListPublikasiDomain(): array
    {
        return DB::select('
            SELECT list_publikasi.*,
                list_publikasi_jenis.name AS list_publikasi_jenis_name,
                list_publikasi_status.name AS list_publikasi_status_name
            FROM list_publikasi
                INNER JOIN list_publikasi_jenis ON list_publikasi.list_publikasi_jenis = list_publikasi_jenis.id
                INNER JOIN list_publikasi_status ON list_publikasi.list_publikasi_status = list_publikasi_status.id
            WHERE list_publikasi.users_id = ?
            ORDER BY list_publikasi.id DESC
        ', [Auth::guard('user')->user()->id]);
    }

    /**
     * ================== faculty ============================================
     */

    /**
     * @method getCountAsetDomainBaseFaculty
     * @return array
     */
    public function getCountAsetDomainBaseFaculty(): array
    {
        return DB::select("SELECT COUNT(*) as total FROM aset WHERE users_id = ?", [Auth::guard('user')->user()->id]);
    }

    /**
     * @method getCountKerjasamaDomainBaseFaculty
     * @return array
     */
    public function getCountKerjasamaDomainBaseFaculty(): array
    {
        return DB::select("SELECT COUNT(*) as total FROM mou_moa WHERE users_id = ?", [Auth::guard('user')->user()->id]);
    }

    /**
     * @method getListMouDomainBaseFacultyAndYear
     * @return array
     */
    public function getListMouDomainBaseFacultyAndYear($request): array
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
            WHERE mou_moa.tahun LIKE ?
                AND mou_moa.users_id = ?
            ORDER BY (mou_moa.tahun = YEAR(NOW())) DESC, mou_moa.tahun DESC
        ', [
            is_null($request->tahun) ? Carbon::now()->year() : "%$request->tahun%", //if request filter is null then send year now and default send request base year selected
            Auth::guard('user')->user()->id
        ]);
    }

    /**
     * @method getCountTotalKegiatanInYearDomainBaseFaculty
     * @return array
     */
    public function getCountTotalKegiatanInYearDomainBaseFaculty(): array
    {
        return DB::select("SELECT COUNT(*) as total FROM kegiatan
                WHERE users_id = ? AND tahun = ?", [Auth::guard('user')->user()->id, Carbon::now()->year()]);
    }
}
