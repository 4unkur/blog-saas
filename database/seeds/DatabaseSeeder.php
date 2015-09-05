<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call(PostsTableSeeder::class);

        Model::reguard();
    }
}

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();
        Post::truncate();

        foreach (range(1,500) as $index) {
            Post::create([
                'title' => $faker->unique->sentence(1),
                'body' => $faker->text(1000),
            ]);
        }
    }
}