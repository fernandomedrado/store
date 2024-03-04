<?php

namespace App\Repositories;

use App\Repositories\AbstractRepositoryAsModel;
use App\Models\Cart;
use App\Contracts\Product\CartRepositoryContract;

class CartRepository extends AbstractRepositoryAsModel implements CartRepositoryContract
{
    public function __construct()
    {
        parent::setModel(new Product());
    }

    public function getWithFilters(array $filters)
    {
        $query = parent::getModel();

        if (array_key_exists('cart_id', $filters) && !is_null($filters['cart_id']))
            $query = $query->where('cart_id', '=', $filters['cart_id']);

        if (array_key_exists('cart_uuid', $filters) && is_int($filters['cart_uuid']))
            $query = $query->where('cart_uuid', '=', $filters['cart_uuid']);

        $query = $query->select('cart_id', 'cart_uuid', 'product_id');

        return $query->get();
    }

    public function create(array $data)
    {
        return parent::create([
            'cart_uuid' => $data['cart_uuid'],
            'product_id' => $data['product_id'],
        ]);
    }

    public function updateOrFail(int $id, array $data)
    {
        $register = parent::getModel()->findOrFail($id);

        $register->update([
            'cart_id' => $data['cart_id'],
            'cart_uuid' => $data['cart_uuid'],
            'product_id' => $data['product_id'],
        ]);

        return $register;
    }

    public function deleteRelations(int $id)
    {
        $query = parent::getModel();
        $result = $query->where('product_id', $id)->delete();

        return $result;
    }
}
