<?php

namespace App\Repositories;

use App\Repositories\AbstractRepositoryAsModel;
use App\Models\Product;
use App\Contracts\Product\ProductRepositoryContract;

class ProductRepository extends AbstractRepositoryAsModel implements ProductRepositoryContract
{
    public function __construct()
    {
        parent::setModel(new Product());
    }

    public function getWithFilters(array $filters)
    {
        $query = parent::getModel();

        if (array_key_exists('product_name', $filters) && !is_null($filters['product_name'])) {
            $query = $query->where('product_name', 'ilike', '%' . $filters['product_name'] . '%');
        }

        if (array_key_exists('product_description', $filters) && is_int($filters['product_description'])) {
            $query = $query->where('product_description', '=', $filters['product_description']);
        }

        $query = $query->select('product_id', 'product_name', 'product_description', 'product_price');

        return $query->get();
    }

    public function create(array $data)
    {
        return parent::create([
            'product_name' => $data['product_name'],
            'product_description' => $data['product_description'],
            'product_price' => $data['product_price'],
        ]);
    }

    public function updateOrFail(int $id, array $data)
    {
        $register = parent::getModel()->findOrFail($id);

        $register->update([
            'product_name' => $data['product_name'],
            'product_description' => $data['product_description'],
            'product_price' => $data['product_price'],
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
