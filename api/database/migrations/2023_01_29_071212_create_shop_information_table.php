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
            $table->string('latitude')->comment('緯度');
            $table->string('longitude')->comment('経度');
            $table->string('shop_image_path')->nullable()->comment('店舗画像');
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
