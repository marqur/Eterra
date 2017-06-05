<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	protected $fillable = [
        'filteri'
    ];

    public function jedinicaMere(){
    return $this->belongsTo(Measure::class, 'jedinica_mere');
}

    public function kategorijaId(){
    return $this->belongsTo(Cat::class, 'kategorija_id');
}

	public function filteri(){
    return $this->belongsToMany(Filter::class, 'filter_products');
}

	public function comments(){
    return $this->hasMany(Comment::class, 'product_id');
}
}
