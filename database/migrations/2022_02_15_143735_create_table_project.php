<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('code')->nullable();
            $table->string('photo')->nullable();
            $table->integer('type')->nullable();
            $table->integer('project_ward_id')->nullable();
            $table->integer('project_province_id')->nullable();
            $table->integer('project_district_id')->nullable();
            $table->text('album')->nullable();
            $table->text('utilities')->nullable();
            $table->text('design_project')->nullable();
            $table->longText('content')->nullable();
            $table->string('investor')->nullable()->comment('Chủ đầu tư');
            $table->string('project_status')->nullable()->comment('Trạng thái dự án');
            $table->string('address')->nullable();
            $table->tinyInteger('crawl')->default(0)->comment('check Hiện link hình ảnh: 1 crawl: 0 lấy bình thường');
            $table->text('options')->nullable();
            $table->tinyInteger('auto')->default(0)->comment('1: lấy tự động, 0 tự đăng');
            $table->tinyInteger('status')->default(0)->comment('1: hiện, 0 ẩn');
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
        Schema::dropIfExists('project');
    }
}
