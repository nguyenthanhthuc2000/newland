<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTinhthanhpho extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('tinhthanhpho', function (Blueprint $table) {
//            $table->string('matp', 5);
//            $table->string('name', 100);
//            $table->string('type', 30);
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tinhthanhpho');
    }
}

//INSERT INTO `tinhthanhpho` VALUES ('01', 'Thành phố Hà Nội', 'Thành phố Trung ương');
//INSERT INTO `tinhthanhpho` VALUES ('02', 'Tỉnh Hà Giang', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('04', 'Tỉnh Cao Bằng', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('06', 'Tỉnh Bắc Kạn', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('08', 'Tỉnh Tuyên Quang', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('10', 'Tỉnh Lào Cai', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('11', 'Tỉnh Điện Biên', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('12', 'Tỉnh Lai Châu', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('14', 'Tỉnh Sơn La', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('15', 'Tỉnh Yên Bái', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('17', 'Tỉnh Hoà Bình', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('19', 'Tỉnh Thái Nguyên', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('20', 'Tỉnh Lạng Sơn', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('22', 'Tỉnh Quảng Ninh', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('24', 'Tỉnh Bắc Giang', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('25', 'Tỉnh Phú Thọ', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('26', 'Tỉnh Vĩnh Phúc', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('27', 'Tỉnh Bắc Ninh', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('30', 'Tỉnh Hải Dương', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('31', 'Thành phố Hải Phòng', 'Thành phố Trung ương');
//INSERT INTO `tinhthanhpho` VALUES ('33', 'Tỉnh Hưng Yên', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('34', 'Tỉnh Thái Bình', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('35', 'Tỉnh Hà Nam', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('36', 'Tỉnh Nam Định', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('37', 'Tỉnh Ninh Bình', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('38', 'Tỉnh Thanh Hóa', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('40', 'Tỉnh Nghệ An', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('42', 'Tỉnh Hà Tĩnh', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('44', 'Tỉnh Quảng Bình', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('45', 'Tỉnh Quảng Trị', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('46', 'Tỉnh Thừa Thiên Huế', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('48', 'Thành phố Đà Nẵng', 'Thành phố Trung ương');
//INSERT INTO `tinhthanhpho` VALUES ('49', 'Tỉnh Quảng Nam', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('51', 'Tỉnh Quảng Ngãi', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('52', 'Tỉnh Bình Định', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('54', 'Tỉnh Phú Yên', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('56', 'Tỉnh Khánh Hòa', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('58', 'Tỉnh Ninh Thuận', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('60', 'Tỉnh Bình Thuận', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('62', 'Tỉnh Kon Tum', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('64', 'Tỉnh Gia Lai', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('66', 'Tỉnh Đắk Lắk', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('67', 'Tỉnh Đắk Nông', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('68', 'Tỉnh Lâm Đồng', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('70', 'Tỉnh Bình Phước', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('72', 'Tỉnh Tây Ninh', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('74', 'Tỉnh Bình Dương', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('75', 'Tỉnh Đồng Nai', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('77', 'Tỉnh Bà Rịa - Vũng Tàu', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('79', 'Thành phố Hồ Chí Minh', 'Thành phố Trung ương');
//INSERT INTO `tinhthanhpho` VALUES ('80', 'Tỉnh Long An', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('82', 'Tỉnh Tiền Giang', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('83', 'Tỉnh Bến Tre', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('84', 'Tỉnh Trà Vinh', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('86', 'Tỉnh Vĩnh Long', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('87', 'Tỉnh Đồng Tháp', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('89', 'Tỉnh An Giang', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('91', 'Tỉnh Kiên Giang', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('92', 'Thành phố Cần Thơ', 'Thành phố Trung ương');
//INSERT INTO `tinhthanhpho` VALUES ('93', 'Tỉnh Hậu Giang', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('94', 'Tỉnh Sóc Trăng', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('95', 'Tỉnh Bạc Liêu', 'Tỉnh');
//INSERT INTO `tinhthanhpho` VALUES ('96', 'Tỉnh Cà Mau', 'Tỉnh');
