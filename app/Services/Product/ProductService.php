<?php

namespace App\Services;

use App\Services\AbstractService;
use App\Strategies\Product\GetWithFiltersStrategy;
use App\Handlers\Product\GetWithFiltersHandler;
use App\Validators\Product\GetWithFiltersValidator;
use App\Repositories\ProductRepository;
use App\Contracts\Product\ProductRepositoryContract;
use Illuminate\Support\Facades\DB;

class ProductService extends AbstractService implements ProductRepositoryContract
{
    public function __construct(
        GetWithFiltersStrategy $getWithFiltersStrategy,
        GetWithFiltersHandler $getWithFiltersHandler,
        GetWithFiltersValidator $getWithFiltersValidator,
        ProductRepository $productRepository,
        ProductRepositoryContract $productRepositoryContract
    )
    {
        $this->setDependencie('get_with_filters_strategy', $getWithFiltersStrategy);
        $this->setDependencie('get_with_filters_handler', $getWithFiltersHandler);
        $this->setDependencie('get_with_filters_validator', $getWithFiltersValidator);
        $this->setDependencie('product_repository', $productRepository);
        $this->setDependencie('product_repository_contract', $productRepositoryContract);
    }

    public function getWithFilters(array $data)
    {
        $product_repository = $this->getDependencie('product_repository');
        $result = $product_repository->getWithFilters($data);
        return $this->rowsPageable($result);
    }

    public function create(array $data)
    {
        $product_repository = $this->getDependencie('product_repository');
        return $product_repository->create($data);
    }

    public function updateOrFail(int $id, array $data)
    {
        $product_repository = $this->getDependencie('product_repository');
        return $product_repository->updateOrFail($id, $data);
    }

    public function deleteOrFail(int $id)
    {
        $product_repository = $this->getDependencie('product_repository');
        return $product_repository->deleteOrFail($id);
    }
}
