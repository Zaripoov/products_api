<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Attributes
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @method static Builder|Attributes newModelQuery()
 * @method static Builder|Attributes newQuery()
 * @method static Builder|Attributes query()
 * @method static Builder|Attributes whereId($value)
 * @method static Builder|Attributes whereKey($value)
 * @method static Builder|Attributes whereValue($value)
 * @mixin Eloquent
 */
class Attributes extends Model
{
    use HasFactory;

    protected $table = 'attributes';

    public $timestamps = false;
}
