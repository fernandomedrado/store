<?php

namespace App\Validators\Product;

use App\Validators\AbstractValidator;
use App\Models\ProductModel;

class StoreValidator extends AbstractValidator
{
    public function __construct()
    {
        $this->messages = array_merge($this->messages, [
            'product_id_invalido' => 'ID do produto deve ser informado',
            'product_name_invalido' => ' Nome do produto deve ser informado',
            'product_description_invalido' => 'Descrição do produto deve ser informado',
            'product_price_invalido' => 'Preço do produto deve ser informado',
        ]);
    }

    public function main()
    {
        $data = $this->getData();

        if (!isset($data['product_id']) || !($data['product_id'] > 0))
            $this->addError('product_id_invalido');

        if (!isset($data['product_name']) || !($data['product_name'] > 0))
            $this->addError('product_name_invalido');

        if (!isset($data['product_description']) || !($data['product_description'] > 0))
            $this->addError('product_description_invalido');

        if (!isset($data['product_price']) || !($data['product_price'] > 0))
            $this->addError('product_price_invalido');

    }
}
