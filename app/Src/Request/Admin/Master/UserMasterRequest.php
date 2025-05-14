<?php

namespace App\Src\Request\Admin\Master;

class UserMasterRequest
{

    public static function postRequestData($request): array
    {
        return $request->validate([
            'name' => 'required|string',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'roles_id' => 'required|exists:roles,id',
        ], [
            'unique' => ':attribute sudah tersedia harap gunakan yang lain',
            'required' => ':attribute wajib di isi',
            'exists' => ':attribute tidak ditemukan di database',
            'email' => ':attribute format salah'
        ]);
    }

    public static function updateRequestData($request): array
    {
        return $request->validate([
            'name' => 'required|string',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'roles_id' => 'required|exists:roles,id',
        ], [
            'required' => ':attribute wajib di isi',
            'exists' => ':attribute tidak ditemukan di database',
            'email' => ':attribute format salah'
        ]);
    }
}
