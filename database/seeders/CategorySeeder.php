<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'BCDs',
            'description' => 'BCDs'
        ]);
        Category::create([
            'name' => 'Boots & Gloves',
            'description' => 'Boots & Gloves'
        ]);
        Category::create([
            'name' => 'Camera Accessories',
            'description' => 'Camera Accessories'
        ]);
        Category::create([
            'name' => 'fins',
            'description' => 'fins'
        ]);
        Category::create([
            'name' => 'Housings',
            'description' => 'Housings'
        ]);
        Category::create([
            'name' => 'Instruments',
            'description' => 'Instruments'
        ]);
        Category::create([
            'name' => 'Light',
            'description' => 'Light'
        ]);
        Category::create([
            'name' => 'Masks',
            'description' => 'Masks'
        ]);
        Category::create([
            'name' => 'Regulator',
            'description' => 'Regulator'
        ]);
        Category::create([
            'name' => 'Scuba Accessories',
            'description' => 'Scuba Accessories'
        ]);
        Category::create([
            'name' => 'Snorkels',
            'description' => 'Snorkels'
        ]);
        Category::create([
            'name' => 'Underwater Cameras',
            'description' => 'Underwater Cameras'
        ]);
        Category::create([
            'name' => 'Wetsuits & Vest',
            'description' => 'Wetsuits & Vest'
        ]);
    }
}
