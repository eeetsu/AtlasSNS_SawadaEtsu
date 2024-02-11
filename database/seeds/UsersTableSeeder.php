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
        ['username' => 'Atlas一郎'],
        ['user_id ' => '1',
        'mail' => 'atlas_ichi@com',
        'password' => bcrypt('123456')],
        ['username' => 'Atlas二郎'],
        ['user_id ' => '2',
        'mail' => 'atlas_ni@com',
        'password' => bcrypt('234567')],
        ['username' => 'Atlas三郎'],
        ['user_id ' => '3',
        'mail' => 'atlas_san@com',
        'password' => bcrypt('345678')],
        ['username' => 'Atlas四郎'],
        ['user_id ' => '4',
        'mail' => 'atlas_yon@com',
        'password' => bcrypt('456789')],
     ]);
    }

}
