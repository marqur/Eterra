<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class PurchaseItem extends Model
{


	public function userId()
 	 {
    return $this->belongsTo(User::class, 'user_id');
	 }


 	public function product()
 	 {
    return $this->belongsToMany(Product::class)->withPivot('quantity');
	 }
}
