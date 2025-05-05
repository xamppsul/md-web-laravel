<?php

namespace App\Modules\Authentication\interfaces;

use Illuminate\Contracts\View\View;

interface Handler_intefaces
{
    public function viewLogin(): View;
    public function login();
}
