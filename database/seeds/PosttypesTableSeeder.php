<?php

use Illuminate\Database\Seeder;

class PosttypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
      public function run()
      {

        DB::table(App\Posttype::getTableName())->insert([
          [
            'type' => 'Comida',
            'icon' => 'images/icons/activities/food.svg',
          ],[
            'type' => 'Siesta',
            'icon' => 'images/icons/activities/nap.svg',
          ],[
            'type' => 'Toillete',
            'icon' => 'images/icons/activities/toillete.svg',
          ],[
            'type' => 'Aprendizaje',
            'icon' => 'images/icons/activities/learning.svg',
          ],[
            'type' => 'Juegos',
            'icon' => 'images/icons/activities/game.svg'
          ],[
            'type' => 'Clases',
            'icon' => 'images/icons/activities/class.svg'
          ]
          ]);
      }
}
