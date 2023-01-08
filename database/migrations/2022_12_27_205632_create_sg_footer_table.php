<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSgFooterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sg_footer', function (Blueprint $table) {
            $table->id();
            $table->string('sg_footer_fb_link', 500);
            $table->string('sg_footer_inst_link', 500);
            $table->string('sg_footer_tw_link', 500);
            $table->string('sg_footer_lk_link', 500);
            $table->string('sg_footer_pt_link', 500);
            $table->string('sg_footer_call_link', 500);
            $table->string('sg_footer_whatsapp_link', 500);
            $table->string('sg_footer_email', 500);
            $table->tinyInteger('sg_footer_status')->default('0');
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
        Schema::dropIfExists('sg_footer');
    }
}