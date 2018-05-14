<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;
use App\ProductImage;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //model factories
        
        // factory(Product::class, 100)->create();
        // factory(ProductImage::class, 500)->create();
        // factory(Product::class, 20)->make();

        $categories = factory(Category::class, 5)->create();
        $categories ->each(function ($c){
            $products = factory(Product::class, 20)->make();
            $c->products()->saveMany($products);
            
            $products->each(function($p){
                $images = factory(ProductImage::class, 5)->make();
                $p->images()->saveMany($images);
            });
        });
    }
}
