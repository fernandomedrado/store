<?php

namespace App\Contracts\Product;

interface ProductRepositoryContract
{
    public function getWithFilters(array $filters);
}
