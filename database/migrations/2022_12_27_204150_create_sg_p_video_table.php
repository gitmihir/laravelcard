<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSgPVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sg_p_video', function (Blueprint $table) {
            $table->id();
            $table->string('sg_p_video_title', 255);
            $table->string('sg_p_video_text', 255);
            $table->longText('sg_p_video_link');
            $table->tinyInteger('sg_p_video_status')->default('0');
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
        Schema::dropIfExists('sg_p_video');
    }
}