<?php

namespace App\Traits;

use App\Services\AbstractService;

trait AvailabilityWithService
{
    private AbstractService $service;

    public function setService(AbstractService $service)
    {
        $this->service = $service;
    }

    public function getService(): AbstractService
    {
        return $this->service;
    }
}
