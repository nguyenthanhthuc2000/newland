<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 35);
            $table->string('title'); //tiêu đề
            $table->string('desc'); //mô tả
            $table->integer('acreage'); //diện tích m2
            $table->double('price'); //giá
            $table->string('unit', 10); //đơn vị
            $table->text('content'); //nội dung
            $table->integer('user_id'); //người đăng
            $table->string('docs', 50); // giấy tờ
            $table->integer('bedroom')->nullable(); //phòng ngủ
            $table->integer('toilet')->nullable(); // nhà vệ sinh
            $table->integer('floor')->nullable(); // tầng lầu
            $table->text('furniture')->nullable(); //nội thất
            $table->text('video')->nullable(); // video
            $table->text('image')->nullable();  // hình ảnh
            $table->text('image_360')->nullable(); // Hình ảnh 360
            $table->integer('category_id')->nullable(); // danh mục
            $table->integer('district')->nullable(); // mã quận huyen
            $table->integer('province_id')->nullable(); // mã tỉnh/tp
            $table->integer('ward_id')->nullable(); // mã xã phường xã thi tran
            $table->integer('street_id')->nullable(); // đường đi
            $table->integer('project_id')->nullable(); // mã dự án
            $table->string('name_contact', 35); // tên người liên hệ
            $table->string('phone_contact', 12); // sdt người liên hệ
            $table->string('address_contact')->nullable(); // địa chỉ người liên hệ
            $table->string('email_contact', 65)->nullable(); // email người liên hệ
            $table->integer('house_direction')->nullable(); // hướng nhà
            $table->integer('balcony_direction')->nullable(); //hướng ban công
            $table->integer('way')->nullable(); // chiều rộng hẻm đường vào nhà/đất
            $table->integer('facade')->nullable(); // chiều rộng mặt tiền
            $table->tinyInteger('highlights')->default(0); // bài viết nổi bật (1 có nổi bật)
            $table->integer('type')->default(0); // loại bài viết (0:thường, vip, vip1, vip2, vip2,...)
            $table->integer('form')->default(0); // hình thức (0:bán/1:cho thuê)
            $table->string('project')->nullable(); // thuộc dự án nào ?
            $table->string('google_map')->nullable(); // bản đồ
            $table->tinyInteger('status'); //trạng thái (0: ẩn, 1: hiện)
            $table->string('start_day'); // ngày bắt đầu
            $table->string('end_day'); // ngày kết thúc
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
        Schema::dropIfExists('article');
    }
}
