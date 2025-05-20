<?php

namespace App\Src\Request\User;

class BahanAjarRequest
{

    public static function postRequestData($request): array
    {
        return $request->validate([
            'judul' => 'required|string',
            'bahan_ajar_jenis' => 'required|exists:bahan_ajar_jenis,id',
            'mata_kuliah' => 'required|string',
            'program_studi' => 'required|string',
            'semester' => 'required|integer',
            'tanggal_terbit' => 'required|date',
            'deskripsi' => 'required|string',
            'file_bahan' => 'required|required|file|mimes:pdf,doc,docx|max:2048',
            'link_bahan' => 'required|string',
            'bahan_ajar_status_penggunaan' => 'required|exists:bahan_ajar_status_penggunaan,id',
        ], [
            'required' => ':attribute wajib di isi',
            'semester.integer' => 'pilih status aset',
            'file_bahan.mimes' => 'file wajib pdf,doc,docx',
            'exists' => ':attribute tidak di temukan di database'
        ]);
    }

    public static function updateRequestData($request): array
    {
        return $request->validate([
            'judul' => 'required|string',
            'bahan_ajar_jenis' => 'required|exists:bahan_ajar_jenis,id',
            'mata_kuliah' => 'required|string',
            'program_studi' => 'required|string',
            'semester' => 'required|integer',
            'tanggal_terbit' => 'required|date',
            'deskripsi' => 'required|string',
            'file_bahan' => 'required|required|file|mimes:pdf,doc,docx|max:2048',
            'link_bahan' => 'required|string',
            'bahan_ajar_status_penggunaan' => 'required|exists:bahan_ajar_status_penggunaan,id',
        ], [
            'required' => ':attribute wajib di isi',
            'semester.integer' => 'pilih status aset',
            'file_bahan.mimes' => 'file wajib pdf,doc,docx',
            'exists' => ':attribute tidak di temukan di database'
        ]);
    }
}
