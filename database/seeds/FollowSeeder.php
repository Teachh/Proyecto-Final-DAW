<?php

use Illuminate\Database\Seeder;

class FollowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i=0; $i<=200; $i++):
            DB::table('follows')
                ->insert([
                    'user_id' => rand(1,10),
                    'user_id_request' => rand(1,10),
                    'created_at' => $faker->dateTime(),
                    'updated_at' => $faker->dateTime(),
                ]);
        endfor;
        echo "Seguidores añadidos";
    }
}
