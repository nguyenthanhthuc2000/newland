<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToImagesArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('images_article', function (Blueprint $table) {
            $table->string('type')->nullable()->after('article_id');//slider// banner
            $table->text('link')->nullable()->after('type');//slider// banner
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('images_article', function (Blueprint $table) {
            //
        });
    }
}
