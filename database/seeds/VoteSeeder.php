<?php

use Illuminate\Database\Seeder;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i=0; $i<=500; $i++):
            $res = '';
            if(rand(0,1) == 1){
                $res = 'pos';
            }
            else{
                $res = 'neg';
            }
            DB::table('votes')
                ->insert([
                    'user_id' => rand(1,10),
                    'draw_id' => rand(1,100),
                    'vote' => $res,
                ]);
        endfor;
        echo "Votos añadidos";
    }
}
