<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i=0; $i<=300; $i++):
            DB::table('comments')
                ->insert([
                    'user_id' => rand(1,10),
                    'draw_id' => rand(1,100),
                    'text' => $faker->paragraph,
                    'like' => rand(1,10), // secret
                    'dislike' => rand(1,10),
                    'created_at' => $faker->dateTime(),
                    'updated_at' => $faker->dateTime(),
                ]);
        endfor;
        echo "Comentarios añadidos";
    }
}
