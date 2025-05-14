<?php

namespace App\Src\Request\Admin\Master;

class KegiatanRequest
{

    public static function postRequestData($request): array
    {
        return $request->validate([
            'nama_kegiatan' => 'required|string',
            'kegiatan_jenis' => 'required|exists:kegiatan_jenis,id',
            'tanggal_kegiatan' => 'required|date',
            'tempat_lokasi' => 'required|string',
            'penyelenggara' => 'required|string',
            'jumlah_peserta' => 'required|integer',
            'file_daftar_hadir' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'file_kegiatan' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'kegiatan_status' => 'required|exists:kegiatan_status,id',
            'keterangan' => 'required|string',
        ], [
            'required' => ':attribute wajib di isi',
            'exists' => ':attribute tidak ditemukan di database',
            'required' => ':attribute file wajib diisi',
            'file' => ':attribute File dokumen tidak valid',
            'mimes' => ':attribute Tipe file harus pdf, doc, docx',
            'max' => ':attribute Ukuran file maksimal 2MB',
        ]);
    }

    public static function updateRequestData($request): array
    {
        return $request->validate([
            'nama_kegiatan' => 'required|string',
            'kegiatan_jenis' => 'required|exists:kegiatan_jenis,id',
            'tanggal_kegiatan' => 'required|date',
            'tempat_lokasi' => 'required|string',
            'penyelenggara' => 'required|string',
            'jumlah_peserta' => 'required|integer',
            'file_daftar_hadir' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'file_kegiatan' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'kegiatan_status' => 'required|exists:kegiatan_status,id',
            'keterangan' => 'required|string',
        ], [
            'required' => ':attribute wajib di isi',
            'exists' => ':attribute tidak ditemukan di database',
            'required' => ':attribute file wajib diisi',
            'file' => ':attribute File dokumen tidak valid',
            'mimes' => ':attribute Tipe file harus pdf, doc, docx',
            'max' => ':attribute Ukuran file maksimal 2MB',
        ]);
    }
}
