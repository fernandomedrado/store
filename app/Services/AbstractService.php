<?php

namespace App\Services;

use App\Traits\Pageable;
use App\Traits\PreventBehaviorsAsService;

abstract class AbstractService
{
    use PreventBehaviorsAsService, Pageable;
}
