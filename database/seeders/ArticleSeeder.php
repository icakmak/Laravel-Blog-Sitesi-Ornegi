<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use  Faker\Factory as Faker;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 200; $i++) {
            $title = $faker->sentence($nbWords = rand(5, 8), $variableNbWords = true);
            DB::table('articles')->insert([
                'category_id' => rand(1, 7),
                'title' => $title,
                'image' => $faker->imageUrl(800, 600, 'cats'),     // 'http://lorempixel.com/800/600/cats/'
                'content' => $faker->paragraph(rand(5, 10)),
                'slug' => Str::slug($title, '-'),
                'created_at' => now(),
                'updated_at' => now()

            ]);
        }
    }
}
