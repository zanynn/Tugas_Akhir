<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    protected $table = 'product_galleries';
    protected $primaryKey = 'id';
    protected $fillable = ['product_id', 'image'];
}
