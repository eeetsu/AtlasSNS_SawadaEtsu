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
        [
          'username' => 'Atlas一郎',
          'mail' => 'atlas_ichi@com',
          'password' => bcrypt('123456')
        ],
        [
          'username' => 'Atlas二郎',
          'mail' => 'atlas_ni@com',
          'password' => bcrypt('234567')
        ],
        [
          'username' => 'Atlas三郎',
          'mail' => 'atlas_san@com',
          'password' => bcrypt('345678')
        ],
        [
          'username' => 'Atlas四郎',
          'mail' => 'atlas_yon@com',
          'password' => bcrypt('456789')
        ],
      ]);
    }

}
