<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Products
 *
 * @property int $id
 * @property string $title
 * @property float $price
 * @property int $count
 * @method static Builder|Products newModelQuery()
 * @method static Builder|Products newQuery()
 * @method static Builder|Products query()
 * @method static Builder|Products whereCount($value)
 * @method static Builder|Products whereId($value)
 * @method static Builder|Products wherePrice($value)
 * @method static Builder|Products whereTitle($value)
 * @method whereIn(string $string, int[]|string[] $array_keys)
 * @method cursorPaginate(mixed $limit)
 * @mixin Eloquent
 */
class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    public $timestamps = false;
}
