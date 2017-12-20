<?php

use Illuminate\Database\Seeder;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_category')->insert([
            ['name' => 'pria', 'parent_category' => NULL],
            ['name' => 'atasan', 'parent_category' => 1],
            ['name' => 'celana', 'parent_category' => 1],
            ['name' => 'jaket', 'parent_category' => 2],
            ['name' => 'kaos', 'parent_category' => 2],
            ['name' => 'jas', 'parent_category' => 2],
            ['name' => 'casual', 'parent_category' => 2],
            ['name' => 'jeans', 'parent_category' => 3],
            ['name' => 'chino', 'parent_category' => 3],
        ]);
    }
}
