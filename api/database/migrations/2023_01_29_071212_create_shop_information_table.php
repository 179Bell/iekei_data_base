<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_information', function (Blueprint $table) {
            $table->id();
            $table->string('shop_name')->comment('店名');
            $table->string('latlong')->comment('緯度経度');
            $table->string('shop_image_path')->nullable()->comment('店舗画像');
            $table->string('prefecture')->comment('都道府県');
            $table->string('city_name')->comment('市区町村');
            $table->string('address')->comment('番地など');
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
        Schema::dropIfExists('shop_information');
    }
};
