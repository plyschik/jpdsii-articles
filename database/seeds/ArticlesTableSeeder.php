<?php

use App\Article;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = resolve(FakerFactory::class);

        for ($i = 0; $i < 200; $i++) {
            Article::create([
                'user_id'       => mt_rand(1, 4),
                'category_id'   => mt_rand(1, 5),
                'title'         => $faker->sentence(8),
                'content'       => $faker->text(2048),
                'created_at'    => $datetime = $faker->dateTime(),
                'updated_at'    => $datetime
            ]);
        }
    }
}