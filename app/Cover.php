<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Cover extends Model
{
      public function productId(){
    return $this->belongsTo(Product::class, 'product_id');
}

}
