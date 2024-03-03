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
          'images' => asset('/public/images/icon1.png')//イメージ画像のパスを格納
      ],
      [
          'username' => 'Atlas二郎',
          'mail' => 'atlas_ni@com',
          'password' => bcrypt('234567'),
          'bio' => '育児奮闘中！',
          'images' => asset('/public/images/icon2.png')//イメージ画像のパスを格納
      ],
      [
          'username' => 'Atlas三郎',
          'mail' => 'atlas_san@com',
          'password' => bcrypt('345678'),
          'bio' => 'システムエンジニアしています！',
          'images' => asset('/public/images/icon3.png')//イメージ画像のパスを格納
      ],
      [
          'username' => 'Atlas四郎',
          'mail' => 'atlas_yon@com',
          'password' => bcrypt('456789'),
          'bio' => 'WEBデザイナーをしています！',
          'images' => asset('/public/images/icon4.png')//イメージ画像のパスを格納
      ],
      [
          'username' => 'aaa',
          'mail' => 'aaa12345@gmail.com',
          'password' => bcrypt('aaa12345'),
          'bio' => '会社員です！',
          'images' => asset('/public/images/icon5.png')//イメージ画像のパスを格納
      ],
    ]);
  }
}
