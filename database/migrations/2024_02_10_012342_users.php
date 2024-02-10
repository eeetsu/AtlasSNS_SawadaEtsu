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
    //　下記コードを記述しましょう。
    Schema::create('users', function (Blueprint $table) {
        $table->increments('id');
        $table->string('username', 255);
        $table->string('mail', 255);
        $table->string('password', 255);
        $table->string('bio', 400);
        $table->string('images', 255);
        $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    //　下記コードを記述しましょう。
    Schema::drop('users');
    }
}
