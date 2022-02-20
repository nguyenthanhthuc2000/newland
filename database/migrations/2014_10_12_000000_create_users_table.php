<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 35);
            $table->string('phone', 12)->nullable();
            $table->string('facebook_id', 100)->nullable(); // login facebook
            $table->string('google_id', 100)->nullable(); //login google
            $table->string('email', 65)->nullable();
            $table->string('password', 65)->nullable();
            $table->date('birthday')->nullable();
            $table->tinyInteger('sex')->nullable(); //1 nam //0 nữ
            $table->string('card_id', 20)->nullable(); // cmnd/cccd
            $table->integer('district_id')->nullable(); // mã quận huyen
            $table->integer('province_id')->nullable(); // mã tỉnh/tp
            $table->integer('ward_id')->nullable(); // mã xã phường xã thi tran
            $table->double('surplus')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
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
