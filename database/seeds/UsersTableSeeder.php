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
          'password' => bcrypt('123456'),
          'bio' => 'クリエイターです！よろしく！'
        ],
        [
          'username' => 'Atlas二郎',
          'mail' => 'atlas_ni@com',
          'password' => bcrypt('234567'),
          'bio' => '育児奮闘中！'
        ],
        [
          'username' => 'Atlas三郎',
          'mail' => 'atlas_san@com',
          'password' => bcrypt('345678'),
          'bio' => 'システムエンジニアしています！'
        ],
        [
          'username' => 'Atlas四郎',
          'mail' => 'atlas_yon@com',
          'password' => bcrypt('456789'),
          'bio' => 'WEBデザイナーをしています！'
        ],
        [
          'username' => 'aaa',
          'mail' => 'aaa12345@gmail.com',
          'password' => bcrypt('aaa12345'),
          'bio' => '会社員です！'
        ],
      ]);
    }

}
