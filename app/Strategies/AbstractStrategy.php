<?php

namespace App\Strategies;

use App\Traits\Configurable;
use App\Traits\AvailabilityWithDependencie;

abstract class AbstractStrategy
{
    use Configurable;
    use AvailabilityWithDependencie;
    
    public function getState(string $key)
    {
        $state = $this->getConfigIndex('state');

        return $state[$key] ?? null;
    }
}
