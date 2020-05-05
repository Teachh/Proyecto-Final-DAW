<?php

use Illuminate\Database\Seeder;

class DrawSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i=0; $i<=100; $i++):
            DB::table('draws')
                ->insert([
                    'title' => $faker->sentence,
                    'description' => $faker->paragraph,
                    'user_id' => rand(1,50),
                    'draw' => $faker->imageUrl($width = 640, $height = 480),
                    'image' => $faker->imageUrl($width = 640, $height = 480),
                    'created_at' => $faker->dateTime(),
                    'updated_at' => $faker->dateTime(),
                ]);
        endfor;
        echo "Dibujos añadidos";
    }
}
