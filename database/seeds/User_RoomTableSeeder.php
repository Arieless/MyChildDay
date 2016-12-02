<?php

use Illuminate\Database\Seeder;

class User_RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
       $i = 0;
       while ($i++ < 50){
         DB::table('user_room')->insert([
           'user_id' => App\User::all()->random()->id,
           'room_id' => App\Room::all()->random()->id,
           'created_at' => date("Y-m-d H:i:s"),
           'updated_at' => date("Y-m-d H:i:s"),
         ]);
       }
     }
}
