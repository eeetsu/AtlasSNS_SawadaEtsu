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
          'password' => bcrypt('12345678'),
          'bio' => 'クリエイターです！よろしく！',
          'images' => 'icon1.png'
      ],
      [
          'username' => 'Atlas二郎',
          'mail' => 'atlas_ni@com',
          'password' => bcrypt('23456789'),
          'bio' => '育児奮闘中！',
          'images' => 'icon2.png'
      ],
      [
          'username' => 'Atlas三郎',
          'mail' => 'atlas_san@com',
          'password' => bcrypt('34567891'),
          'bio' => 'システムエンジニアしています！',
          'images' => 'icon3.png'
      ],
      [
          'username' => 'Atlas四郎',
          'mail' => 'atlas_yon@com',
          'password' => bcrypt('45678912'),
          'bio' => 'WEBデザイナーをしています!',
          'images' => 'icon4.png'
      ],
      [
          'username' => 'Atlas五郎',
          'mail' => 'atlas_go@com',
          'password' => bcrypt('56789123'),
          'bio' => '会社員です！',
          'images' => 'icon5.png'
      ],
      [
          'username' => 'Atlas六郎',
          'mail' => 'atlas_roku@com',
          'password' => bcrypt('67891234'),
          'bio' => '会社員です！',
          'images' => 'icon6.png'
      ],
      [
          'username' => 'aaa',
          'mail' => 'aaa12345@gmail.com',
          'password' => bcrypt('aaa12345'),
          'bio' => '会社員です！',
          'images' => 'icon7.png'
      ],
    ]);
  }
}
