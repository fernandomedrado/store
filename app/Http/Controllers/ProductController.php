<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Exceptions\ValidatorException;
use App\Http\Requests\Product\GetWithFiltersProductRequest;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Requests\Product\DestroyProductRequest;
use App\Http\Controllers\Resources\Product\ProductListResource;
use App\Http\Controllers\Resources\Product\ProductShowResource;
use App\Services\Product\ProductService;

class ProductController extends Controller
{
    public function __construct(ProductService $service)
    {
        parent::setService($service);
    }

    public function index(Request $request)
    {
        return parent::execute(function () use ($request) {
            $filters = $request->query();
            $result = parent::getService()->getWithFilters($filters);

            if (isset($result['rows']))
                $result['rows'] = ProductListResource::collection($result['rows']);
            else
                return new ProductListResource($result);

            return $result;
        });
    }

    public function store(StoreProductRequest $request)
    {
        return parent::execute(function () use ($request) {
            try {
                $data = $request->all();
                $result = parent::getService()->create($data);

                $this->setResponseHTTPCode(Response::HTTP_OK);

                return $result;
            } catch (ValidatorException | Throwable $exc) {
                $this->setResponseHTTPCode(Response::HTTP_BAD_REQUEST);
                throw $exc;
            }
        });
    }

    public function show(int $id)
    {
        return parent::execute(function () use ($id) {
            return parent::getService()->getById($id);
        });
    }

    public function update(UpdateProductRequest $request, int $id)
    {
        return parent::execute(function () use ($request, $id) {
            try {
                $data = $request->all();
                $result = parent::getService()->updateOrFail($id, $data);

                $this->setResponseHTTPCode(Response::HTTP_OK);

                return $result;
            } catch (ValidatorException | Throwable $exc) {
                $this->setResponseHTTPCode(Response::HTTP_BAD_REQUEST);
                throw $exc;
            }
        });
    }

    public function destroy(int $id)
    {
        return parent::execute(function () use ($id) {
            try {
                $result = parent::getService()->destroyOrFail($id);

                $this->setResponseHTTPCode(Response::HTTP_OK);

                return $result;
            } catch (ValidatorException | Throwable $exc) {
                $this->setResponseHTTPCode(Response::HTTP_BAD_REQUEST);
                throw $exc;
            }
        });
    }
}
