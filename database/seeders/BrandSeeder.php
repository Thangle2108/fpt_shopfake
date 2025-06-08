<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = ['Nike', 'Adidas', 'Puma', 'Reebok'];

        foreach ($brands as $name) {
            DB::table('brands')->insert([
                'name' => $name,
                'slug' => Str::slug($name),
                'logo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
