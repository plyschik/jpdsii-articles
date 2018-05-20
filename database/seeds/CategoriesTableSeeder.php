<?php

use App\Category;
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
        Category::create([
            'name' => 'Orci varius'
        ]);

        Category::create([
            'name' => 'Natoque penatibus'
        ]);

        Category::create([
            'name' => 'Et magnis'
        ]);

        Category::create([
            'name' => 'Tempor dui'
        ]);

        Category::create([
            'name' => 'Amet fermentum'
        ]);
    }
}
