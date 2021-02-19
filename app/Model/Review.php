<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = "reviews";
    protected $fillable = ['id', 'product_id', 'customer', 'review', 'star', 'updated_at', 'created_at'];
    protected $hidden = ['created_at', 'updated_at'];

    public function product () {
        return $this->belongsTo('App\Model\Product', 'product_id', 'id');
    }
}
