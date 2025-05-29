<?php

namespace App\Src\Request\User;

class KegiatanRequest
{

    public static function postRequestData($request): array
    {
        return $request->validate([
            'nama_kegiatan' => 'required|string',
            'kegiatan_jenis' => 'required|exists:kegiatan_jenis,id',
            'tahun' => 'required|integer',
            'tanggal_kegiatan' => 'required|date',
            'tempat_lokasi' => 'required|string',
            'penyelenggara' => 'required|string',
            'jumlah_peserta' => 'required|integer',
            'file_daftar_hadir' => 'required|file|mimes:pdf,doc,docx,xls|max:2048',
            'file_kegiatan' => 'required|file|mimes:jpg,png,jpeg|max:2048',
            'kegiatan_status' => 'required|exists:kegiatan_status,id',
            'keterangan' => 'required|string',
        ], [
            'required' => ':attribute wajib di isi',
            'exists' => ':attribute tidak ditemukan di database',
            'file' => ':attribute File dokumen tidak valid',
            'file_kegiatan.mimes' => ' Tipe file harus jpg,png,jpeg',
            'file_daftar_hadir.mimes' => ' Tipe file harus pdf,doc,docx,xls',
            'max' => ':attribute Ukuran file maksimal 2MB',
        ]);
    }

    public static function updateRequestData($request): array
    {
        return $request->validate([
            'nama_kegiatan' => 'required|string',
            'kegiatan_jenis' => 'required|exists:kegiatan_jenis,id',
            'tahun' => 'required|integer',
            'tanggal_kegiatan' => 'required|date',
            'tempat_lokasi' => 'required|string',
            'penyelenggara' => 'required|string',
            'jumlah_peserta' => 'required|integer',
            'file_daftar_hadir' => 'required|file|mimes:pdf,doc,docx,xls|max:2048',
            'file_kegiatan' => 'required|file|mimes:jpg,png,jpeg|max:2048',
            'kegiatan_status' => 'required|exists:kegiatan_status,id',
            'keterangan' => 'required|string',
        ], [
            'required' => ':attribute wajib di isi',
            'exists' => ':attribute tidak ditemukan di database',
            'file' => ':attribute File dokumen tidak valid',
            'file_kegiatan.mimes' => ' Tipe file harus jpg,png,jpeg',
            'file_daftar_hadir.mimes' => ' Tipe file harus pdf,doc,docx,xls',
            'max' => ':attribute Ukuran file maksimal 2MB',
        ]);
    }
}
