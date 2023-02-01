<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductsAttributes
 *
 * @property int $id
 * @property int $product_id
 * @property string $attribute_key
 * @property string $attribute_value
 * @method static Builder|ProductsAttributes newModelQuery()
 * @method static Builder|ProductsAttributes newQuery()
 * @method static Builder|ProductsAttributes query()
 * @method static Builder|ProductsAttributes whereAttributeKey($value)
 * @method static Builder|ProductsAttributes whereAttributeValue($value)
 * @method static Builder|ProductsAttributes whereId($value)
 * @method static Builder|ProductsAttributes whereProductId($value)
 * @method groupBy(string $string)
 * @method orWhere(\Closure $param)
 * @mixin Eloquent
 */
class ProductsAttributes extends Model
{
    use HasFactory;

    protected $table = 'products_attributes';

    public $timestamps = false;
}
