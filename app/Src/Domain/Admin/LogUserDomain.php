<?php

namespace App\Src\Domain\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LogUserDomain
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
     * @method getAllLogUserDomain
     * @param $request
     * @return array
     */
    public function getAllLogUserDomain(
        $request
    ): array {
        return DB::select('
            SELECT * FROM logs
                WHERE   logs.message LIKE ?
                AND     logs.created_at LIKE ?
            ORDER BY logs.id ASC
        ', [
            "%$request->name%",
            "%$request->username%",
            "%$request->email%",
            "%$request->roles_id%"
        ]);
    }

    /**
     * @method getDetailLogUserDomain
     * @param $id
     * @return array
     */
    public function getDetailLogUserDomain($id): array
    {
        return DB::select('SELECT * FROM logs WHERE id = ?', [$id]);
    }
}
