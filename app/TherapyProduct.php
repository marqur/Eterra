<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class TherapyProduct extends Model
{
    public function productId(){
    return $this->belongsTo(Product::class, 'productId');
}

public function therapyId(){
    return $this->belongsTo(Therapy::class, 'therapyId');
}
}
