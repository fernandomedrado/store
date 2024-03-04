<?php

namespace App\Contracts\Product;

interface CartRepositoryContract
{
    public function cart(array $filters);
    public function removeCart(int $id);
}
