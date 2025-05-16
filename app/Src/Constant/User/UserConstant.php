<?php

namespace App\Src\Constant\User;

class UserConstant
{
    public function formatRupiah(int $amount): string
    {
        return 'Rp.' . number_format($amount, 0, ',', '.');
    }
}
