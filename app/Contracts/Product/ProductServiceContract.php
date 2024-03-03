<?php

namespace App\Contracts\Product;

interface ProductServiceContract
{
    public function getWithFilters(array $filters);
    public function create(array $data);
    public function updateOrFail(int $id, array $data);
    public function deleteOrFail(int $id);
}
