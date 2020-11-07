<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Category::class, 5)->create()->each(function ($category) {
        	factory(App\Models\Product::class, 10)->create()->each(function($product) use ($category) {
        		$category->products()->attach($product->id); // Insert dữ liệu vào bảng category_product
        	});
	    });
    }
}
