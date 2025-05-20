<?php

namespace App\Src\Request\User;

class PengabdianRequest
{

    public static function postRequestData($request): array
    {
        return $request->validate([
            'users_id' => 'required|exists:users,id',
            'judul' => 'required|string',
            'pengabdian_bidang' => 'required|exists:pengabdian_bidang,id',
            'pengabdian_sumber_dana' => 'required|exists:pengabdian_sumber_dana,id',
            'tahun' => 'required|integer|digits:4',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date|after_or_equal:tgl_mulai',
            'lokasi' => 'required|string',
            'jumlah_peserta' => 'required|integer',
            'laporan_pengabdian' => 'required|required|file|mimes:pdf,doc,docx|max:2048',
            'dokumentasi' => 'required|required|file|mimes:jpg,png,jpeg|max:2048',
            'pengabdian_status' => 'required|exists:pengabdian_status,id',
            'catatan' => 'required|string',
        ], [
            'required' => ':attribute wajib di isi',
            'jumlah_peserta.integer' => 'pilih status aset',
            'laporan_pengabdian.mimes' => 'file wajib pdf,doc,docx',
            'dokumentasi.mimes' => 'file wajib jpg,png,jpeg',
            'exists' => ':attribute tidak di temukan di database'
        ]);
    }

    public static function updateRequestData($request): array
    {
        return $request->validate([
            'users_id' => 'required|exists:users,id',
            'judul' => 'required|string',
            'pengabdian_bidang' => 'required|exists:pengabdian_bidang,id',
            'pengabdian_sumber_dana' => 'required|exists:pengabdian_sumber_dana,id',
            'tahun' => 'required|integer|digits:4',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date|after_or_equal:tgl_mulai',
            'lokasi' => 'required|string',
            'jumlah_peserta' => 'required|integer',
            'laporan_pengabdian' => 'required|required|file|mimes:pdf,doc,docx|max:2048',
            'dokumentasi' => 'required|required|file|mimes:jpg,png,jpeg|max:2048',
            'pengabdian_status' => 'required|exists:pengabdian_status,id',
            'catatan' => 'required|string',
        ], [
            'required' => ':attribute wajib di isi',
            'jumlah_peserta.integer' => 'pilih status aset',
            'laporan_pengabdian.mimes' => 'file wajib pdf,doc,docx',
            'dokumentasi.mimes' => 'file wajib jpg,png,jpeg',
            'exists' => ':attribute tidak di temukan di database'
        ]);
    }
}
