<?php

namespace App\Src\Request\Admin\Master;

class MouMoaRequest
{

    public static function postRequestData($request): array
    {
        return $request->validate([
            'nomor_dokumen' => 'required',
            'jenis_dokumen' => 'required|string',
            'nama_mitra' => 'required|integer',
            'judul_kerjasama' => 'required',
            'mou_moa_klasifikasi' => 'required|exists:mou_moa_klasifikasi,id',
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required|integer',
            'mou_moa_status' => 'required|integer|exists:mou_moa_status,id',
            'mou_moa_bidang_kerjasama' => 'required|integer|exists:mou_moa_bidang_kerjasama,id',
            'users_id' => 'required|exists:users,id',
            'dokumen_pendukung' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:2048',
            'keterangan_tambahan' => 'required|string',
        ], [
            'unique' => ':attribute sudah tersedia harap gunakan yang lain',
            'required' => ':attribute wajib di isi',
            'exists' => ':attribute tidak ditemukan di database',
            'dokumen_pendukung.required' => 'Dokumen pendukung wajib diisi',
            'dokumen_pendukung.file' => 'File dokumen tidak valid',
            'dokumen_pendukung.mimes' => 'Tipe file harus pdf, doc, docx, jpg, atau png',
            'dokumen_pendukung.max' => 'Ukuran file maksimal 2MB',
        ]);
    }

    public static function updateRequestData($request): array
    {
        return $request->validate([
            'nomor_dokumen' => 'required',
            'jenis_dokumen' => 'required|string',
            'nama_mitra' => 'required|integer',
            'judul_kerjasama' => 'required',
            'mou_moa_klasifikasi' => 'required|exists:mou_moa_klasifikasi,id',
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required|integer',
            'mou_moa_status' => 'required|integer|exists:mou_moa_status,id',
            'mou_moa_bidang_kerjasama' => 'required|integer|exists:mou_moa_bidang_kerjasama,id',
            'users_id' => 'required|exists:users,id',
            'dokumen_pendukung' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:2048',
            'keterangan_tambahan' => 'required|string',
        ], [
            'unique' => ':attribute sudah tersedia harap gunakan yang lain',
            'required' => ':attribute wajib di isi',
            'exists' => ':attribute tidak ditemukan di database',
            'dokumen_pendukung.required' => 'Dokumen pendukung wajib diisi',
            'dokumen_pendukung.file' => 'File dokumen tidak valid',
            'dokumen_pendukung.mimes' => 'Tipe file harus pdf, doc, docx, jpg, atau png',
            'dokumen_pendukung.max' => 'Ukuran file maksimal 2MB',
        ]);
    }
}
