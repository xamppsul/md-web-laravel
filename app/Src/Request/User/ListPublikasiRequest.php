<?php

namespace App\Src\Request\User;

class ListPublikasiRequest
{

    public static function postRequestData($request): array
    {
        return $request->validate([
            'judul_publikasi' => 'required|string',
            'list_publikasi_jenis' => 'required|exists:list_publikasi_jenis,id',
            'nama_jurnal' => 'required|string',
            'volume' => 'required|string',
            'nomor' => 'required|integer',
            'tahun_terbit' => 'required|integer',
            'tanggal_terbit' => 'required|date',
            'penulis_lain' => 'required|string',
            'link_publikasi' => 'required|string',
            'file_publikasi' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'doi' => 'required|string',
            'list_publikasi_status' => 'required|exists:list_publikasi_status,id',
            'keterangan' => 'required|string',
        ], [
            'required' => ':attribute wajib di isi',
            'nomor.integer' => 'pilih status aset',
            'file_publikasi.mimes' => 'file wajib pdf,doc,docx',
            'exists' => ':attribute tidak di temukan di database'
        ]);
    }

    public static function updateRequestData($request): array
    {
        return $request->validate([
            'judul_publikasi' => 'required|string',
            'list_publikasi_jenis' => 'required|exists:list_publikasi_jenis,id',
            'nama_jurnal' => 'required|string',
            'volume' => 'required|string',
            'nomor' => 'required|integer',
            'tahun_terbit' => 'required|integer',
            'tanggal_terbit' => 'required|date',
            'penulis_lain' => 'required|string',
            'link_publikasi' => 'required|string',
            'file_publikasi' => 'file|mimes:pdf,doc,docx|max:2048',
            'doi' => 'required|string',
            'list_publikasi_status' => 'required|exists:list_publikasi_status,id',
            'keterangan' => 'required|string',
        ], [
            'required' => ':attribute wajib di isi',
            'nomor.integer' => 'pilih status aset',
            'file_publikasi.mimes' => 'file wajib pdf,doc,docx',
            'exists' => ':attribute tidak di temukan di database'
        ]);
    }
}
