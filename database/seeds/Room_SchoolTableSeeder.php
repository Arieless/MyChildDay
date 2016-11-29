<?php

use Illuminate\Database\Seeder;

class Room_SchoolTableSeeder extends Seeder
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
         DB::table('room_school')->insert([
           'room_id' => App\Room::all()->random()->id,
           'school_id' => App\School::all()->random()->id,
           'created_at' => date("Y-m-d H:i:s"),
           'updated_at' => date("Y-m-d H:i:s"),
         ]);
       }
     }
}
