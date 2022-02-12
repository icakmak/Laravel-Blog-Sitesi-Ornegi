<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use  Faker\Factory as Faker;

use Illuminate\Support\Facades\DB;


class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = ['Hakkımızda', 'Kariyer', 'Vizyonumuz', 'Misyonumuz', 'İletişim'];
        $count = 0;
        foreach ($pages as $pg) {
            $count++;
            DB::table('pages')->insert(
                [
                    'title' => $pg,
                    'slug' => Str::slug($pg, '-'),
                    'image' => "https://smallbusinesstraininginc.com/wp-content/uploads/Business-la-gi-e1623418238104.jpeg",
                    'content' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis itaque similique dolorum, hic cum dolores minus, distinctio ipsam obcaecati repudiandae deserunt, quia delectus dolor accusantium adipisci. Amet eligendi soluta ratione?",
                    'order' => $count

                ]
            );
        }
    }
}
