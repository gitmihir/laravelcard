<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSgBrandDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sg_brand_details', function (Blueprint $table) {
            $table->id();
            $table->string('sg_brand_logo', 500);
            $table->string('sg_favicon_icon', 500);
            $table->string('sg_brand_tagline', 255);
            $table->string('sg_brand_business_name', 255);
            $table->string('sg_brand_business_logo', 255);
            $table->string('sg_brand_business_address', 255);
            $table->string('sg_brand_business_email', 255);
            $table->string('sg_brand_busienss_phone', 255);
            $table->longText('sg_brand_tandc_line');
            $table->string('sg_brand_upload_limit', 255);
            $table->tinyInteger('sg_brand_status')->default('0');
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
        Schema::dropIfExists('sg_brand_details');
    }
}