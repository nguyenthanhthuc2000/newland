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
            $table->integer('form')->default(0); // hình thức (0:bán/1:cho thuê)
            $table->integer('category_id')->nullable(); // danh mục (loại bất động sản)
            $table->integer('province_id')->nullable(); // mã tỉnh/tp
            $table->integer('district_id')->nullable(); // mã quận huyen
            $table->integer('ward_id')->nullable(); // mã xã phường
            $table->string('street_id')->nullable(); // đường đi
            $table->string('address_on_post', 255)->nullable(); // đại chỉ trên bài đăng
            $table->string('google_map')->nullable(); // bản đồ
            $table->string('title'); //tiêu đề
            $table->string('sub_title'); //mô tả
            $table->text('content'); //nội dung
            $table->integer('acreage'); //diện tích m2
            $table->double('price'); //giá
            $table->string('unit', 10); //đơn vị giá
            $table->string('legal_documents', 64); // giấy tờ pháp lí
            $table->integer('bedroom')->nullable(); //phòng ngủ
            $table->integer('toilet')->nullable(); // nhà vệ sinh
            $table->integer('floor')->nullable(); // tầng lầu
            $table->integer('house_direction')->nullable(); // hướng nhà
            $table->integer('balcony_direction')->nullable(); //hướng ban công
            $table->integer('way')->nullable(); // chiều rộng hẻm đường vào nhà/đất(đường vào)
            $table->float('facade')->nullable(); // chiều rộng mặt tiền
            $table->text('furniture')->nullable(); //nội thất
            $table->text('video')->nullable(); // video
            $table->text('image_360')->nullable(); // Hình ảnh 360
            $table->integer('user_id')->nullable(); //người đăng
            $table->string('name_contact', 35); // tên người liên hệ
            $table->string('phone_contact', 12); // sdt người liên hệ
            $table->string('address_contact')->nullable(); // địa chỉ người liên hệ
            $table->string('email_contact', 65)->nullable(); // email người liên hệ
            $table->tinyInteger('highlights')->default(0); // bài viết nổi bật (1 có nổi bật)
            $table->integer('type')->default(0); // loại bài viết (0:thường, vip, vip1, vip2, vip2,...)
            $table->string('project_id')->nullable(); // thuộc dự án nào ?
            $table->string('start_day')->nullable(); // ngày bắt đầu
            $table->string('end_day')->nullable(); // ngày kết thúc
            $table->tinyInteger('status')->default(1); //trạng thái (0: ẩn, 1: hiện)
            $table->tinyInteger('featured')->default(0); //trạng thái (0: không nổi bật, 1: nổi bật)
            $table->tinyInteger('vip')->nullable(); //trạng thái (0: không nổi bật, 1: nổi bật)
            $table->tinyInteger('state')->default(0); //trạng thái (0: tin mới,1: đã bán, 2: đã đc thuê, 3: đã đặt cọc)
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
