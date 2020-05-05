<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        DB::table('users')
                ->insert([
                    'name' => 'hector',
                    'email' => 'hector@hector.com',
                    'email_verified_at' => now(),
                    'biography' => 'Me llamo Hector y soy el creador de esta página web',
                    'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
                    'remember_token' => 5,
                    'rol' => 'admin',
                    'profile_picture' => 'profileImages/1588271720.png',
                    'background' => 'img/wave-thumb.jpg',
                    'created_at' => $faker->dateTime(),
                    'updated_at' => $faker->dateTime()
                ]);
        for($i=0; $i<=100; $i++):
            DB::table('users')
                ->insert([
                    'name' => $faker->firstName,
                    'email' => $faker->unique()->safeEmail,
                    'email_verified_at' => now(),
                    'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
                    'remember_token' => 5,
                    'profile_picture' => $faker->imageUrl($width = 640, $height = 480),
                    'background' => $faker->imageUrl($width = 640, $height = 480),
                    'created_at' => $faker->dateTime(),
                    'updated_at' => $faker->dateTime()
                ]);
        endfor;
        echo "Usuarios añadidos";

    }
}
