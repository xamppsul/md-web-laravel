<?php

namespace App\Src\Request\User;

class AsetRequest
{

    public static function postRequestData($request): array
    {
        return $request->validate([
            'kode_aset' => 'required|unique:aset,kode_aset',
            'nama_aset' => 'required|string',
            'aset_kategori' => 'required|exists:aset_kategori,id',
            'model_merk_aset' => 'required',
            'tahun' => 'required|year',
            'tanggal_perolehan_aset' => 'required',
            'lokasi_aset' => 'required',
            'aset_kondisi' => 'required|exists:aset_kondisi,id',
            'aset_status' => 'required|exists:aset_status,id',
            'harga_perolehan_aset' => 'required|integer',
            'sumber_dana_aset' => 'required',
            'keterangan_aset' => 'required',
        ], [
            'unique' => ':attribute sudah tersedia harap gunakan yang lain',
            'required' => ':attribute wajib di isi',
            'exists' => ':attribute tidak di temukan di database'
        ]);
    }

    public static function updateRequestData($request): array
    {
        return $request->validate([
            'kode_aset' => 'required|unique:aset,kode_aset',
            'nama_aset' => 'required|string',
            'aset_kategori' => 'required|exists:aset_kategori,id',
            'model_merk_aset' => 'required',
            'tahun' => 'required|year',
            'tanggal_perolehan_aset' => 'required',
            'lokasi_aset' => 'required',
            'aset_kondisi' => 'required|exists:aset_kondisi,id',
            'aset_status' => 'required|exists:aset_status,id',
            'harga_perolehan_aset' => 'required|integer',
            'sumber_dana_aset' => 'required',
            'keterangan_aset' => 'required',
        ], [
            'unique' => ':attribute sudah tersedia harap gunakan yang lain',
            'required' => ':attribute wajib di isi',
            'exists' => ':attribute tidak di temukan di database'
        ]);
    }
}
