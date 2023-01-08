<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSgContactFrontTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sg_contact_front', function (Blueprint $table) {
            $table->id();
            $table->string('sg_contact_title', 255);
            $table->string('sg_contact_detail', 500);
            $table->string('sg_contact_email', 255);
            $table->string('sg_contact_number', 255);
            $table->tinyInteger('sg_contact_status')->default('0');
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
        Schema::dropIfExists('sg_contact_front');
    }
}