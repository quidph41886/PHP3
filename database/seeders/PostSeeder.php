<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //code trong run
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('posts')->insert([
                'title' => $faker->text(25),
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeSW1DezVFqvBNWirjS6bb9EVpKGaXanmoSQ&s',
                'description' => $faker->text(50),
                'content' => $faker->text(),
                'view' => rand(1, 1000),
                'cate_id' => rand(1, 4),

            ]);
        }
    }
}
