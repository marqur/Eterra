<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Therapy extends Model
{
	public function products(){
    return $this->belongsToMany(Product::class, 'therapy_products');
}
}
