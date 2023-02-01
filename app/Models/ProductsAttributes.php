<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsAttributes extends Model
{
    use HasFactory;

    protected $table = 'products_attributes';

    public $timestamps = false;
}