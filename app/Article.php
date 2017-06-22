<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

	 protected $kategorija;

    public function kategorijaId(){
    return $this->belongsTo(NewsCategory::class, 'kategorija_id');
}

}
