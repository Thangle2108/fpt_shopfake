<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $nike = DB::table('brands')->where('slug', 'nike')->value('id');
        $adidas = DB::table('brands')->where('slug', 'adidas')->value('id');

        $men = DB::table('categories')->where('slug', 'men')->value('id');
        $women = DB::table('categories')->where('slug', 'women')->value('id');

        $products = [
            [
                'name' => 'Nike Air Zoom Pegasus',
                'slug' => Str::slug('Nike Air Zoom Pegasus'),
                'brand_id' => $nike,
                'category_id' => $men,
                'short_desc' => 'Popular men\'s running shoes',
                'description' => 'Comfortable and lightweight for everyday runs.',
                'price' => 120.00,
                'sale_price' => 99.99,
                'stock' => 50,
                'is_active' => true,
            ],
            [
                'name' => 'Adidas Ultraboost',
                'slug' => Str::slug('Adidas Ultraboost'),
                'brand_id' => $adidas,
                'category_id' => $men,
                'short_desc' => 'Responsive shoes with boost cushioning',
                'description' => 'A favourite of runners looking for comfort.',
                'price' => 180.00,
                'sale_price' => null,
                'stock' => 30,
                'is_active' => true,
            ],
            [
                'name' => 'Women Basic T-Shirt',
                'slug' => Str::slug('Women Basic T-Shirt'),
                'brand_id' => $nike,
                'category_id' => $women,
                'short_desc' => 'Soft cotton t-shirt for everyday wear',
                'description' => 'Classic fit with breathable material.',
                'price' => 25.00,
                'sale_price' => 19.99,
                'stock' => 100,
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            DB::table('products')->insert(array_merge($product, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
