<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            ['name' => str_random(10), 'price' => 150000, 'discount_in_percent' => 10, 'description' => 'This is brief description of product', 'stock' => 50],
            ['name' => str_random(10), 'price' => 200000, 'discount_in_percent' => 20, 'description' => 'This is brief description of product', 'stock' => 50],
            ['name' => str_random(10), 'price' => 300000, 'discount_in_percent' => 10, 'description' => 'This is brief description of product', 'stock' => 50],
            ['name' => str_random(10), 'price' => 400000, 'discount_in_percent' => 20, 'description' => 'This is brief description of product', 'stock' => 50],
            ['name' => str_random(10), 'price' => 500000, 'discount_in_percent' => 10, 'description' => 'This is brief description of product', 'stock' => 50],
            ['name' => str_random(10), 'price' => 600000, 'discount_in_percent' => 30, 'description' => 'This is brief description of product', 'stock' => 50],
            ['name' => str_random(10), 'price' => 700000, 'discount_in_percent' => 10, 'description' => 'This is brief description of product', 'stock' => 50],
        ]);
    }
}
