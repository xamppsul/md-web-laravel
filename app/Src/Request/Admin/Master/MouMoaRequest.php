<?php

namespace App\Src\Request\Admin\Master;

class MouMoaRequest
{

    public static function postRequestData($request): array
    {
        return $request->validate([
            'nomor_dokumen' => 'required',
            'mou_moa_jenis_dokumen' => 'required|exists:mou_moa_jenis_dokumen,id',
            'nama_mitra' => 'required|string',
            'judul_kerjasama' => 'required',
            'mou_moa_klasifikasi' => 'required|exists:mou_moa_klasifikasi,id',
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
            'exists' => ':attribute tidak ditemukan di database',
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
            'exists' => ':attribute tidak ditemukan di database',
            'dokumen_pendukung.required' => 'Dokumen pendukung wajib diisi',
            'dokumen_pendukung.file' => 'File dokumen tidak valid',
            'dokumen_pendukung.mimes' => 'Tipe file harus pdf, doc, docx',
            'dokumen_pendukung.max' => 'Ukuran file maksimal 2MB',
        ]);
    }
}
