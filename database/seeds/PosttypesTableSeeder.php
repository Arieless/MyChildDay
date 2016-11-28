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
          factory(App\Posttype::class, 5)->create();
      }
}
