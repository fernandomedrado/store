<?php

namespace App\Handlers\Product;

use App\Handlers\AbstractHandler;

class GetWithFiltersHandler extends AbstractHandler
{
    public function main(array $data)
    {
        $keys = [
            'product_id',
            'product_name',
            'product_description',
            'product_price',
        ];

        foreach ($keys as $row) {
            $value = (!empty($data[$row])) ? trim($data[$row]) : '';
            if (empty($value))
                $data[$row] = null;
        }

        $data['product_id'] = (!empty($data['product_id'])) ? $data['product_id'] : null;
        $data['product_name'] = (!empty($data['product_name'])) ? $data['product_name'] : null;
        $data['product_description'] = (!empty($data['product_description'])) ? $data['product_description'] : null;
        $data['product_price'] = (!empty($data['product_price'])) ? $data['product_price'] : null;

        return $data;
    }
}
