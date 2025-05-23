<?php

namespace App\Src\Domain\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserMasterDomain
{
    /**
     * @method DomainLogInsert
     *  transaction data with log error to table log_errors
     * @param $message
     * @param $route
     * @param $path
     * @param $type
     * @return void
     */

    public function DomainLogInsert(
        string $message,
        string $route,
        string $path,
        string $type,
    ): void {
        DB::insert('insert into logs (message,route,path,type,created_at,updated_at) values (?, ?, ?, ?, ?, ?)', [$message, $route, $path, $type, now(), now()]);
    }
    /**=========================================================================================================
     * feature: master data mou moa
    /**=========================================================================================================
     */
    /**
     * @method getAllUserMasterDomain
     * @param $request
     * @return array
     */
    public function getAllUserMasterDomain(
        $request
    ): array {
        return DB::select('
            SELECT users.*, 
                roles.name AS roles_name
            FROM users
                INNER JOIN roles ON users.roles_id = roles.id
            WHERE users.name LIKE ?
                AND users.username LIKE ?
                AND users.email LIKE ?
                AND users.roles_id LIKE ?
            ORDER BY users.id DESC
        ', [
            "%$request->name%",
            "%$request->username%",
            "%$request->email%",
            "%$request->roles_id%"
        ]);
    }

    /**
     * @method getRolesUserMasterDomain
     * @return array
     */
    public function getRolesUserMasterDomain(): array
    {
        return DB::select('SELECT * FROM roles WHERE id != 1');
    }



    /**
     * @method getDetailUserMasterDomain
     * @param $id
     * @return array
     */
    public function getDetailUserMasterDomain($id): array
    {
        return DB::select('
            SELECT users.*, 
                roles.name AS roles_name
            FROM users
                INNER JOIN roles ON users.roles_id = roles.id
            WHERE users.id = ?
        ', [$id]);
    }

    /**
     * @method postDataUserMasterDomain
     * @param $request
     * @return void
     */
    public function postDataUserMasterDomain($request): void
    {
        DB::insert('insert into users 
            (name,
            username,
            email,
            password,
            roles_id,
            created_at) values (?, ?, ?, ?, ?, ?)', [
            $request->name,
            $request->username,
            $request->email,
            Hash::make($request->password),
            $request->roles_id,
            now()
        ]);
    }

    /**
     * @method updateDataUserMasterDomain
     * @param $request
     * @param $id
     * @return void
     */

    public function updateDataUserMasterDomain($id, $request): void
    {
        DB::update('UPDATE users SET 
            name = ?,
            username = ?,
            email = ?,
            password = ?,
            roles_id = ?,
            updated_at = ?
            WHERE id = ?', [
            $request->name,
            $request->username,
            $request->email,
            Hash::make($request->password),
            $request->roles_id,
            now(),
            $id
        ]);
    }

    /**
     * @method deleteDataUserMasterDomain
     * @param $id
     * @return void
     */

    public function deleteDataUserMasterDomain($id): void
    {
        DB::delete('DELETE FROM users WHERE id = ?', [$id]);
    }
}
