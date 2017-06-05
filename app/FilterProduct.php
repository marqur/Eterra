<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class FilterProduct extends Model
{
    public function productId(){
    return $this->belongsTo(Product::class, 'productId');
}

public function filterId(){
    return $this->belongsTo(Filter::class, 'filterId');
}
}
