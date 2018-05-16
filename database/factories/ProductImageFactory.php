<?php

use Faker\Generator as Faker;
use App\ProductImage;

$factory->define(ProductImage::class, function (Faker $faker) {
	    $width = 250;
    	$height = 250;
    return [

        'image' => $faker->imageUrl($width, $height, 'fashion', true, 'Faker', true),
        'product_id'=> $faker ->numberBetween(1, 100)
    ];
});
