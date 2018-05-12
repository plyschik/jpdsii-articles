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
        for ($i = 0; $i < 100; $i++) {
            Article::create([
                'user_id' => mt_rand(1, 2),
                'title' => str_random(mt_rand(64, 128)),
                'content' => str_random(1024)
            ]);
        }
    }
}
