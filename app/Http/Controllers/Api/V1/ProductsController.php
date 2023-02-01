<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Api\V1\ProductPropertiesRequest;
use App\Services\Product\GetProductService;
use Illuminate\Http\JsonResponse;

class ProductsController extends ApiController
{
    public function list(ProductPropertiesRequest $request): JsonResponse
    {
        return $this->responseSuccess(GetProductService::getProducts($request->getProperties()));

    }


}
