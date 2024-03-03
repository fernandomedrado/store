<?php

namespace App\Validators\Product;

use App\Validators\AbstractValidator;
use App\Models\ProductModel;

class DestroyValidator extends AbstractValidator
{
    public function __construct()
    {
        $this->messages = array_merge($this->messages, []);
    }

    public function main()
    {
        $data = $this->getData();

        if (!empty($data['id']))
            $this->addError('id');
    }
}
