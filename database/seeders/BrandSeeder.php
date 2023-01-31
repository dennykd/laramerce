<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'name' => 'Sealife',
            'brand_code' => 'Sealife',
            'description' => 'Sealife',
        ]);
        Brand::create([
            'name' => 'OMS',
            'brand_code' => 'OMS',
            'description' => 'OMS',
        ]);
        Brand::create([
            'name' => 'Nauticam',
            'brand_code' => 'Nauticam',
            'description' => 'Nauticam',
        ]);
        Brand::create([
            'name' => 'Tusa',
            'brand_code' => 'Tusa',
            'description' => 'Tusa',
        ]);
        Brand::create([
            'name' => 'Xs Scuba',
            'brand_code' => 'Xs Scuba',
            'description' => 'Xs Scuba',
        ]);
    }
}
