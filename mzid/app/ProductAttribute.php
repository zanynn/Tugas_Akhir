<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $table = 'product_attributes';
    protected $primaryKey = 'id';
    protected $fillable = ['product_id', 'sku', 'size', 'price', 'stock'];
}
