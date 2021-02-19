<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $fillable = ['id', 'name', 'detail', 'price', 'stock', 'discount', 'updated_at', 'created_at'];
    protected $hidden = ['created_at', 'updated_at'];

    public function reviews () {
        return $this->hasMany('App\Model\Review', 'product_id', 'id');
    }
}
