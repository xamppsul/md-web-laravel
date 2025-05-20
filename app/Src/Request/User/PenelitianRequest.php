<?php

namespace App\Src\Request\User;

class PenelitianRequest
{

    public static function postRequestData($request): array
    {
        return $request->validate([
            'users_id' => 'required|exists:users,id',
            'judul' => 'required|string',
            'bidang_ilmu' => 'required|string',
            'tahun' => 'required|integer|digits:4',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date|after_or_equal:tgl_mulai',
            'penelitian_sumber_dana' => 'required|exists:penelitian_sumber_dana,id',
            'jumlah_dana' => 'required|integer',
            'anggota_tim' => 'required|string',
            'laporan_akhir' => 'required|required|file|mimes:pdf,doc,docx|max:2048',
            'penelitian_status' => 'required|exists:penelitian_status,id',
            'catatan' => 'required|string',
        ], [
            'required' => ':attribute wajib di isi',
            'jumlah_dana.integer' => 'pilih status aset',
            'laporan_akhir.mimes' => 'file wajib pdf,doc,docx',
            'exists' => ':attribute tidak di temukan di database'
        ]);
    }

    public static function updateRequestData($request): array
    {
        return $request->validate([
            'users_id' => 'required|exists:users,id',
            'judul' => 'required|string',
            'bidang_ilmu' => 'required|string',
            'tahun' => 'required|integer|digits:4',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date|after_or_equal:tgl_mulai',
            'penelitian_sumber_dana' => 'required|exists:penelitian_sumber_dana,id',
            'jumlah_dana' => 'required|integer',
            'anggota_tim' => 'required|string',
            'laporan_akhir' => 'required|required|file|mimes:pdf,doc,docx|max:2048',
            'penelitian_status' => 'required|exists:penelitian_status,id',
            'catatan' => 'required|string',
        ], [
            'required' => ':attribute wajib di isi',
            'jumlah_dana.integer' => 'pilih status aset',
            'laporan_akhir.mimes' => 'file wajib pdf,doc,docx',
            'exists' => ':attribute tidak di temukan di database'
        ]);
    }
}
