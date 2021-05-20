<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    /**
     * Bu bölümde Faker yani yalancı data oluşturduk.
     * Sentence=başlığa 6 kelimelik rast gele oluştur.
     *
     */

    public function run()
    {
        $faker=Faker::create();
        for ($i=0;$i<4;$i++){

            $title=$faker->sentence('6');

            DB::table('blogs')->insert([
               'category_id'=>rand(1,7),
               'title'=>$title,
               'image'=>$faker->imageUrl(800,400,'cats',true,'Blog Sitesi'),
               'content'=>$faker->paragraph(6),
               'slug'=>Str::slug($faker->title),
                'created_at'=>$faker->dateTime('now'),
                'updated_at'=>now()
            ]);
        }
    }
}
