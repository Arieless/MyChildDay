<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //TABLES
      $this->call(UsersTableSeeder::class);
      $this->call(SchoolsTableSeeder::class);
      $this->call(KidsTableSeeder::class);
      $this->call(RoomsTableSeeder::class);
      $this->call(PosttypesTableSeeder::class);
      $this->call(PostsTableSeeder::class);
      //PIVOT TABLES
      $this->call(User_RoomTableSeeder::class);
      $this->call(User_KidTableSeeder::class);
      $this->call(Kid_RoomTableSeeder::class);
      $this->call(Post_KidTableSeeder::class);
    }
}
