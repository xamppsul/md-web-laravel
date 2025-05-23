<?php

namespace App\Src\Request\User;

class RiwayatJabatanRequest
{

    public static function postRequestData($request): array
    {
        return $request->validate([
            'nama_jabatan' => 'required|string',
            'riwayat_jabatan_jenis' => 'required|exists:riwayat_jabatan_jenis,id',
            'unit_kerja' => 'required|string',
            'no_sk_jabatan' => 'required|string',
            'tanggal_sk' => 'required|date',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'date|after_or_equal:tanggal_mulai',
            'dokumen_sk' => 'required|required|file|mimes:pdf,doc,docx|max:2048',
            'riwayat_jabatan_status' => 'required|exists:riwayat_jabatan_status,id',
            'keterangan' => 'required|string',
        ], [
            'required' => ':attribute wajib di isi',
            'dokumen_sk.mimes' => 'file wajib pdf,doc,docx',
            'exists' => ':attribute tidak di temukan di database'
        ]);
    }

    public static function updateRequestData($request): array
    {
        return $request->validate([
            'nama_jabatan' => 'required|string',
            'riwayat_jabatan_jenis' => 'required|exists:riwayat_jabatan_jenis,id',
            'unit_kerja' => 'required|string',
            'no_sk_jabatan' => 'required|string',
            'tanggal_sk' => 'required|date',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'date|after_or_equal:tanggal_mulai',
            'dokumen_sk' => 'required|required|file|mimes:pdf,doc,docx|max:2048',
            'riwayat_jabatan_status' => 'required|exists:riwayat_jabatan_status,id',
            'keterangan' => 'required|string',
        ], [
            'required' => ':attribute wajib di isi',
            'dokumen_sk.mimes' => 'file wajib pdf,doc,docx',
            'exists' => ':attribute tidak di temukan di database'
        ]);
    }
}
