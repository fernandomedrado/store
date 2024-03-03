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
use App\Services\Product\ProductService;

class ProductController extends Controller
{

}
