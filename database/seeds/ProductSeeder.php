<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product();
        $product->name = ('San Phan 1');
        $product->description = ('Day la san phan 1 ');
        $product->image = ('hinh1.jpeg');
        $product->price = 1000;
        $product->save();

        $product = new Product();
        $product->name = ('San Phan 2');
        $product->description = ('Day la san phan 2 ');
        $product->image = ('hinh2.jpeg');
        $product->price = 5000;
        $product->save();

        $product = new Product();
        $product->name = ('San Phan 3');
        $product->description = ('Day la san phan 3 ');
        $product->image = ('hinh3.jpeg');
        $product->price = 7000;
        $product->save();
    }
}
