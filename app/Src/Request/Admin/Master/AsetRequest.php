<?php

namespace App\Src\Request\Admin\Master;

class AsetRequest
{

    public static function postRequestData($request): array
    {
        return $request->validate([
            'kode_aset' => 'required',
            'nama_aset' => 'required|string',
            'kategori_aset' => 'required|integer',
            'model_merk_aset' => 'required',
            'tanggal_perolehan_aset' => 'required',
            'lokasi_aset' => 'required',
            'kondisi_aset' => 'required|integer',
            'status_aset' => 'required|integer',
            'harga_perolehan_aset' => 'required|integer',
            'sumber_dana_aset' => 'required',
            'keterangan_aset' => 'required',
        ], [
            'required' => ':attribute wajib di isi',
            'status_aset.integer' => 'pilih status aset',
            'kondisi_aset.integer' => 'pilih kondisi aset',
            'kategori_aset.integer' => 'pilih kategori aset',
        ]);
    }
}
