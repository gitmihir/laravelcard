<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSgCustomRequirementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sg_custom_requirement', function (Blueprint $table) {
            $table->id();
            $table->string('sg_cr_name', 255);
            $table->string('sg_cr_contact_no', 255);
            $table->string('sg_cr_email', 255);
            $table->string('sg_cr_message', 255);
            $table->tinyInteger('sg_cr_status')->default('0');
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
        Schema::dropIfExists('sg_custom_requirement');
    }
}