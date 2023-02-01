<?php

namespace App\Http\Resources\Api\V1;

use App\Models\Products;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Products */
class ProductResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'title' => $this->title,
            'price' => $this->price,
            'count' => $this->count,
        ];
    }
}
