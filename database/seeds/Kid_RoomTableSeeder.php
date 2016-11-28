<?php

use Illuminate\Database\Seeder;

class Kid_RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     //PREGUNTAR OTRA MANERA

    public function run()
    {
      $i = 0;
      while ($i++ < 10){
        DB::table('kid_room')->insert([
          'kid_id' => App\Kid::all()->random()->id,
          'room_id' => App\Room::all()->random()->id,
          'created_at' => date("Y-m-d H:i:s"),
          'updated_at' => date("Y-m-d H:i:s"),
        ]);
      }
    }
}
