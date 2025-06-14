<?php

namespace App\Src\Request\Admin\Master;

class MouMoaRequest
{

    public static function postRequestData($request): array
    {
        return $request->validate([
            'nomor_dokumen' => 'required|unique:mou_moa,nomor_dokumen',
            'mou_moa_jenis_dokumen' => 'required|exists:mou_moa_jenis_dokumen,id',
            'nama_mitra' => 'required|string',
            'judul_kerjasama' => 'required',
            'mou_moa_klasifikasi' => 'required|exists:mou_moa_klasifikasi,id',
            'tahun' => 'required|integer',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_mulai',
            'mou_moa_status' => 'required|exists:mou_moa_status,id',
            'mou_moa_bidang_kerjasama' => 'required|exists:mou_moa_bidang_kerjasama,id',
            'users_id' => 'required|exists:users,id',
            'dokumen_pendukung' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'keterangan_tambahan' => 'required|string',
        ], [
            'unique' => ':attribute sudah tersedia harap gunakan yang lain',
            'required' => ':attribute wajib di isi',
            'users_id.exists' => 'penanggung jawab tidak ditemukan di database',
            'mou_moa_klasifikasi.exists' => 'klasifikasi tidak ditemukan di database',
            'mou_moa_bidang_kerjasama.exists' => 'bidang kerjasama tidak ditemukan di database',
            'mou_moa_jenis_dokumen.exists' => 'jenis dokumen tidak ditemukan di database',
            'dokumen_pendukung.required' => 'Dokumen pendukung wajib diisi',
            'dokumen_pendukung.file' => 'File dokumen tidak valid',
            'dokumen_pendukung.mimes' => 'Tipe file harus pdf, doc, docx',
            'dokumen_pendukung.max' => 'Ukuran file maksimal 2MB',
        ]);
    }

    public static function updateRequestData($request): array
    {
        return $request->validate([
            'nomor_dokumen' => 'required',
            'mou_moa_jenis_dokumen' => 'required|exists:mou_moa_jenis_dokumen,id',
            'nama_mitra' => 'required|string',
            'judul_kerjasama' => 'required',
            'mou_moa_klasifikasi' => 'required|exists:mou_moa_klasifikasi,id',
            'tahun' => 'required|integer',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_mulai',
            'mou_moa_status' => 'required|exists:mou_moa_status,id',
            'mou_moa_bidang_kerjasama' => 'required|exists:mou_moa_bidang_kerjasama,id',
            'users_id' => 'required|exists:users,id',
            'dokumen_pendukung' => 'file|mimes:pdf,doc,docx|max:2048',
            'keterangan_tambahan' => 'required|string',
        ], [
            'required' => ':attribute wajib di isi',
            'users_id.exists' => 'penanggung jawab tidak ditemukan di database',
            'mou_moa_klasifikasi.exists' => 'klasifikasi tidak ditemukan di database',
            'mou_moa_bidang_kerjasama.exists' => 'bidang kerjasama tidak ditemukan di database',
            'mou_moa_jenis_dokumen.exists' => 'jenis dokumen tidak ditemukan di database',
            'dokumen_pendukung.required' => 'Dokumen pendukung wajib diisi',
            'dokumen_pendukung.file' => 'File dokumen tidak valid',
            'dokumen_pendukung.mimes' => 'Tipe file harus pdf, doc, docx',
            'dokumen_pendukung.max' => 'Ukuran file maksimal 2MB',
        ]);
    }
}
