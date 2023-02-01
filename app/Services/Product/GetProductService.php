<?php

namespace App\Services\Product;

use App\Http\Resources\Api\V1\ProductResource;
use App\Models\Products;
use App\Models\ProductsAttributes;

class GetProductService
{
    public static function getProductsIdByAttributes(array $properties): array
    {

        $attributes = ProductsAttributes::query()->select(['product_id']);

        foreach ($properties as $key => $value) {
            $attributes = $attributes->orWhere(function ($query) use ($key, $value) {
                $query->where('attribute_key', '=', $key)
                    ->whereIn('attribute_value', $value);
            });
        }

        return $attributes->groupBy('product_id')
            ->get()
            ->keyBy('product_id')
            ->toArray();
    }

    public static function getProducts($properties = [], $limit = 15): array
    {
        if (!empty($properties)) {
            $attributes = self::getProductsIdByAttributes($properties);
        }

        $products = Products::query();

        if (isset($attributes))
            $products = $products->whereIn('id', array_keys($attributes));

        $products = $products->cursorPaginate($limit);

        $items = [];

        foreach ($products->items() as $model) {
            $items[] = new ProductResource($model);
        }

        return [
            'items' => $items,
            'paginate' => [
                'count' => $products->count(),
                'hasPages' => $products->hasPages(),
                'nextCursor' => $products->nextCursor()?->encode(),
                'previousCursor' => $products->previousCursor()?->encode(),
                'perPage' => $products->perPage(),
            ],
        ];
    }

}
