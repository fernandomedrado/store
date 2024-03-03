<?php

namespace App\Strategies\Product;

use App\Strategies\AbstractStrategy;
use App\Repositories\ProductRepository;
use App\Validators\Product\GetWithFiltersValidator;
use App\Handlers\Product\GetWithFiltersHandler;

class GetWithFiltersStrategy extends AbstractStrategy
{
    public function __construct(
        GetWithFiltersHandler $getWithFiltersHandler,
        GetWithFiltersValidator $getWithFiltersValidator,
        ProductRepository $repository,
    )
    {
        $this->setDependencie('get_with_filters_handler', $getWithFiltersHandler);
        $this->setDependencie('get_with_filters_validator', $getWithFiltersValidator);
        $this->setDependencie('product_repository', $repository);
    }

    public function execute(array $data)
    {
        $repository = $this->getDependencie('product_repository');
        return $repository->getWithFilters($data);
    }
}
