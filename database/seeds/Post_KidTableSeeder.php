<?php

use Illuminate\Database\Seeder;

class Post_KidTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
       $i = 0;
       while ($i++ < 10){
         DB::table('post_kid')->insert([
           'post_id' => App\Post::all()->random()->id,
           'kid_id' => App\Kid::all()->random()->id,
           'created_at' => date("Y-m-d H:i:s"),
           'updated_at' => date("Y-m-d H:i:s"),
         ]);
       }
     }
}
