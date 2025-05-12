<?php

namespace App\Src\Constant\Admin;

class ConstantAdmin
{
    public function formatRupiah(int $amount): string
    {
        return 'Rp.' . number_format($amount, 0, ',', '.');
    }
}
