<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSgCouponCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sg_coupon_code', function (Blueprint $table) {
            $table->id();
            $table->string('sg_franchise_id', 255);
            $table->string('sg_coupon_code', 255);
            $table->string('sg_coupon_discount', 255);
            $table->tinyInteger('sg_coupon_status')->default('0');
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
        Schema::dropIfExists('sg_coupon_code');
    }
}