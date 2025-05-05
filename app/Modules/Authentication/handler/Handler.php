<?php

namespace App\Modules\Authentication\handler;

use App\Modules\Authentication\interfaces\Handler_intefaces;
use App\Modules\Authentication\usecase\Usecase;
use App\Src\Constant\Authentication\ConstantAuth;

class Handler extends Usecase implements Handler_intefaces
{
    public function __construct(
        private ConstantAuth $constant,
    ) {}
}
