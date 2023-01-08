<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSgContactUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sg_contact_us', function (Blueprint $table) {
            $table->id();
            $table->string('sg_cu_name', 255);
            $table->string('sg_cu_contact_number', 255);
            $table->string('sg_cu_email', 255);
            $table->string('sg_cu_message', 255);
            $table->tinyInteger('sg_cu_status')->default('0');
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
        Schema::dropIfExists('sg_contact_us');
    }
}