<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSgCardDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sg_card_details', function (Blueprint $table) {
            $table->id();
            /* Busieness Info */
            $table->string('sg_cd_user_email', 255);
            $table->string('sg_cd_user_phone', 255);
            $table->string('sg_cd_card_id', 255);
            $table->string('sg_cd_cover_image', 500);
            $table->string('sg_cd_profile_image', 500);
            $table->string('sg_cd_name', 255);
            $table->string('sg_cd_designation', 255);
            $table->string('sg_cd_company_name', 255);
            $table->longText('sg_cd_about_us');
            $table->string('sg_cd_phone_number', 255);
            $table->string('sg_cd_whatsapp_number', 255);
            $table->string('sg_cd_email', 255);
            $table->string('sg_cd_website', 255);

            /* Social Profile */
            $table->string('sg_cd_Facebook', 255);
            $table->string('sg_cd_Instagram', 255);
            $table->string('sg_cd_Twitter', 255);
            $table->string('sg_cd_Linkedin', 255);

            /* Location */
            $table->string('sg_cd_Office', 255);
            $table->string('sg_cd_Branch', 255);
            //$table->string('sg_cd_Branch', 255);

            /* Card Service - multiple */
            $table->string('sg_cd_Service_Title', 255);
            $table->string('sg_Service_Image', 255);
            $table->longText('sg_cd_Service_About');

            /* Card Youtube */
            $table->string('sg_cd_YouTube_Link', 255);

            /* Card Payment */
            $table->string('sg_cd_Google_Pay', 255);
            $table->string('sg_cd_Phone_pe', 255);
            $table->string('sg_cd_Paytm', 255);
            $table->string('sg_Bhim_UPI', 255);

            /* Card Link */
            $table->string('sg_cd_Title', 255);
            $table->string('sg_cd_Link', 255);

            /* Card QR */
            $table->string('sg_cd_QR_Library', 255);
            $table->string('sg_cd_QR_Link', 255);

            $table->tinyInteger('sg_cd_status')->default('0');
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
        Schema::dropIfExists('sg_card_details');
    }
}