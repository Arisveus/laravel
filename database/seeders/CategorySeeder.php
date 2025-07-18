<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Frutas',]);
        Category::create(['name' => 'Tecnologia',]);
        Category::create(['name' => 'Aparelhos dentários',]);
        Category::create(['name' => 'Esportes']);
        Category::create(['name' => 'Política']);
    }
}
