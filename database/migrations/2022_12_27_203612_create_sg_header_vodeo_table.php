<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSgHeaderVodeoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sg_header_vodeo', function (Blueprint $table) {
            $table->id();
            $table->string('sg_home_video', 500)->nullable();
            $table->string('sg_tag_line', 255);
            $table->tinyInteger('sg_header_video_status')->default('0');
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
        Schema::dropIfExists('sg_header_vodeo');
    }
}