<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
        	'product_code' => str_random(5),
        	'product_name' => 'Ceramic Mugs',
        	'product_price' => '120',
        	'image' => 'https://cdn.shopify.com/s/files/1/1605/3843/products/product-image-241894778_grande.jpg?v=1493548585'
        ]);

        Product::insert([
            'product_code' => str_random(5),
            'product_name' => 'Cat Shoes Hand',
            'product_price' => '100',
            'image' => 'https://i.pinimg.com/originals/8d/20/09/8d2009c7919abe345e2e00adea6908cb.jpg'
        ]);

        Product::insert([
            'product_code' => str_random(5),
            'product_name' => 'Cat Bags',
            'product_price' => '150',
            'image' => 'https://i.pinimg.com/736x/33/e9/b6/33e9b6b095ace94e80bd7223ce6ff2d7--cat-backpack-cat-bag.jpg'
        ]); 
         Product::insert([
            'product_code' => str_random(5),
            'product_name' => 'Dolly Dynamite',
            'product_price' => '150',
            'image' => 'https://i.pinimg.com/originals/c6/e1/0e/c6e10e6db9c845f053db220e476ca934.jpg'
        ]);  
         Product::insert([
            'product_code' => str_random(5),
            'product_name' => 'Short Dress Cats',
            'product_price' => '150',
            'image' => 'https://www.dhresource.com/0x0s/f2-albu-g2-M00-1F-D1-rBVaG1RsMIiADTB3AAH6wjLJTLI904.jpg/spring-fall-2016-black-white-stripes-short.jpg'
        ]);  
         Product::insert([
            'product_code' => str_random(5),
            'product_name' => 'Cat Dress',
            'product_price' => '150',
            'image' => 'https://img0.etsystatic.com/217/0/8054848/il_340x270.1282561192_bwlv.jpg'
        ]);   
    }
}
