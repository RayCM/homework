<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUbikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubikes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sno')->comment("站點代號");
            $table->string('sna')->comment("中文場站名稱");
            $table->integer('tot')->comment("場站總停車格");
            $table->integer('sbi')->comment("可借車位數");
            $table->string('sarea')->comment("中文場站區域");
            $table->string('mday')->comment("資料更新時間");
            $table->float('lat')->comment("緯度");
            $table->float('lng')->comment("經度");
            $table->string('ar')->comment("中文地址");
            $table->string('sareaen')->comment("英文場站區域");
            $table->string('snaen')->comment("英文場站名稱");
            $table->string('aren')->comment("英文地址");
            $table->integer('bemp')->comment("可還空位數");
            $table->integer('act')->comment("場站是否停運");
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
        Schema::dropIfExists('ubikes');
    }
}
