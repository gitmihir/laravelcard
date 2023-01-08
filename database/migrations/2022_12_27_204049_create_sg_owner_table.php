<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSgOwnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sg_owner', function (Blueprint $table) {
            $table->id();
            $table->string('sg_owner_title', 255);
            $table->string('sg_owner_image', 255);
            $table->longText('sg_owner_text');
            $table->tinyInteger('sg_owner_status')->default('0');
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
        Schema::dropIfExists('sg_owner');
    }
}