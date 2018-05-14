<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	//category->pruducts
    public function products()
    {
    	return $this->hasMany(Product::class);
    }
}
