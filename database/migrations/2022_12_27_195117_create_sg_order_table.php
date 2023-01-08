<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSgOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sg_order', function (Blueprint $table) {
            $table->id();
            $table->string('sg_user_email', 255);
            $table->string('sg_user_phone', 255);
            $table->string('sg_order_id', 255);
            $table->string('sg_order_number', 255);
            $table->string('sg_product_ids', 255);
            $table->string('sg_card_total', 255);
            $table->string('sg_coupon_code', 255);
            $table->string('sg_ad_total', 255);
            $table->string('sg_GST', 255);
            $table->string('sg_order_value', 255);
            $table->string('sg_total_product_count', 255);
            $table->string('sg_business_name', 255);
            $table->string('sg_business_address', 255);
            $table->string('sg_business_GST_number', 255);
            $table->string('sg_business_email', 255);
            $table->string('sg_business_phone', 255);
            $table->string('sg_s_name', 255);
            $table->string('sg_s_address', 500);
            $table->string('sg_s_email', 255);
            $table->string('sg_s_phone', 255);
            $table->string('sg_tracking_status', 255);
            $table->string('sg_user_password', 255);
            $table->tinyInteger('sg_order_status')->default('0');
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
        Schema::dropIfExists('sg_order');
    }
}