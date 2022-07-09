<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Post::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // for ($i=0; $i < 30; $i++) { 
        //     $c = Category::inRandomOrder()->first();
        //     $title = Str::random(20);
        //     Post::create([
        //         'title'  => $title,
        //         'slug'  => Str::slug($title),
        //         'content'  => "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>",
        //         'description'  => "<p>Lorem ipsum dolor sit amet.</p>",
        //         'category_id'  => $c->id,
        //         'posted'  => $faker->randomElement(["yes", "not"]),
        //     ]);
        // }

        for ($i=0; $i < 30; $i++) { 
            $c = Category::inRandomOrder()->first();
            $title = "Post $i";
            Post::create([
                'title'  =>  $title,
                // 'title'  => "Post ".$i,
                'slug'  => Str::slug($title),
                // 'slug'  => "post-".$i,
                'description'  => $faker->realText($maxNbChars = 50, $indexSize = 2),
                'content'  => $faker->realText($maxNbChars = 200, $indexSize = 2),
                'posted'  => $faker->randomElement(["yes", "not"]),
                'category_id'  => $c->id,
                // 'category_id'  => $faker->numberBetween(1, 20),
            ]);
        }
    }
}
