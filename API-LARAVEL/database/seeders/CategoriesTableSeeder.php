<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as FakerFactory;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [];
        $faker = FakerFactory::create();
        $image_categories = ['abstract', 'animals', 'business', 'cats', 'city', 'food', 'nature', 'technics', 'transport'];
        for ($i = 0; $i < 8; $i++) {
            $name = $faker->unique()->word();
            $name = str_replace('.', '', $name);
            $slug = str_replace(' ', '-', strtolower($name));
            $category = $image_categories[mt_rand(0, 8)];

            $image_path = '/laragon/www/images/categories';

            $image_fullpath = $faker->image($image_path, 500, 300, $category, true, true, $category);
            $image = basename($image_fullpath); // Mengambil hanya nama file dari path lengkap
            $categories[$i] = [
                'name' => $name,
                'slug' => $slug,
                'image' => $image,
                'status' => 'PUBLISH',
                'created_at' => Carbon::now(),
            ];
        }
        DB::table('categories')->insert($categories);
    }
}
