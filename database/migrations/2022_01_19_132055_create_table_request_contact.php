<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRequestContact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_contact', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id');
            $table->string('name', 35);
            $table->string('phone', 12);
            $table->string('email', 65)->nullable();
            $table->text('content')->nullable();
            $table->tinyInteger('status')->default(0); //0: chờ xử lí, 1: đã xử lí
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
        Schema::dropIfExists('request_contact');
    }
}
