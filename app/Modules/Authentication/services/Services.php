<?php

namespace App\Modules\Authentication\services;

use App\Modules\Authentication\interfaces\Services_interfaces;
use App\Modules\Authentication\repository\Repository;

class Services extends Repository implements Services_interfaces
{
    public function loginService()
    {
        return 'halo';
    }
}
