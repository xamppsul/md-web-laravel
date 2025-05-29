<?php

namespace App\Src\Request\Admin\Master;

class AsetRequest
{

    public static function postRequestData($request): array
    {
        return $request->validate([
            'users_id' => 'required|exists:users,id',
            'kode_aset' => 'required|unique:aset,kode_aset',
            'nama_aset' => 'required|string',
            'aset_kategori' => 'required|exists:aset_kategori,id',
            'model_merk_aset' => 'required',
            'tahun' => 'required|integer',
            'tanggal_perolehan_aset' => 'required|date',
            'lokasi_aset' => 'required',
            'aset_kondisi' => 'required|exists:aset_kondisi,id',
            'aset_status' => 'required|exists:aset_status,id',
            'harga_perolehan_aset' => 'required|integer',
            'sumber_dana_aset' => 'required',
            'keterangan_aset' => 'required',
        ], [
            'unique' => ':attribute sudah tersedia harap gunakan yang lain',
            'required' => ':attribute wajib di isi',
            'status_aset.integer' => 'pilih status aset',
            'kondisi_aset.integer' => 'pilih kondisi aset',
            'kategori_aset.integer' => 'pilih kategori aset',
            'aset_kategori.exists' => 'kategori aset not found from database',
            'aset_status.exists' => 'status aset not found from database',
            'aset_kondisi.exists' => 'kondisi aset not found from database',
            'users_id.exists' =>  'fakultas not found from database'
        ]);
    }

    public static function updateRequestData($request): array
    {
        return $request->validate([
            'users_id' => 'required|exists:users,id',
            'kode_aset' => 'required',
            'nama_aset' => 'required|string',
            'aset_kategori' => 'required|exists:aset_kategori,id',
            'model_merk_aset' => 'required',
            'tahun' => 'required|integer',
            'tanggal_perolehan_aset' => 'required|date',
            'lokasi_aset' => 'required',
            'aset_kondisi' => 'required|exists:aset_kondisi,id',
            'aset_status' => 'required|exists:aset_status,id',
            'harga_perolehan_aset' => 'required|integer',
            'sumber_dana_aset' => 'required',
            'keterangan_aset' => 'required',
        ], [
            'required' => ':attribute wajib di isi',
            'status_aset.integer' => 'pilih status aset',
            'kondisi_aset.integer' => 'pilih kondisi aset',
            'kategori_aset.integer' => 'pilih kategori aset',
            'exists' => ':attribute tidak di temukan di database'
        ]);
    }
}
