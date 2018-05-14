<?php

use App\Article;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            Article::create([
                'user_id'       => mt_rand(1, 2),
                'category_id'   => mt_rand(1, 3),
                'title'         => $faker->sentence(8),
                'content'       => $faker->text(2048)
            ]);
        }
    }
}
