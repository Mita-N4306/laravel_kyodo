<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' => 'user_2',
        'email' => 'user_2@yahoo.co.jp',
        'password' => bcrypt('12345678'),
      ]);
      DB::table('users')->insert([
        'name' => 'user_3',
        'email' => 'user_3@yahoo.co.jp',
        'password' => bcrypt('12345678'),
      ]);
    }
}
