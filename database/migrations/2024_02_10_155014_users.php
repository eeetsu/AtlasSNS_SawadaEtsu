<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('users', function (Blueprint $table) {
        $table->integer('id')->autoIncrement();
        $table->string('username',255);
        $table->string('mail',255);
        $table->string('password',255);
        $table->string('bio',400)->nullable();
        $table->string('images',255)->default('icon1.png');
        $table->timestamp('created_at')->useCurrent();
        $table->timestamp('updated_at')->default(DB::raw('current_timestamp on update current_timestamp'));
    });

     // userのidにて「icon1.png〜icon7.png」の割り振る設定
     //forループを用いて、1から7までの番号を持つユーザーにそれぞれ異なる画像ファイルを割り当てる処理を追加
    for ($i = 1; $i <= 7; $i++) {
        //ループの中で DB::table('users')->insert()を使い、images列に 'icon1.png' から 'icon7.png' までを順番に代入
        DB::table('users')->insert([
            'images' => 'icon' . $i . '.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
