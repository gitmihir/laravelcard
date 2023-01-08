<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSgFranchiseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sg_franchise', function (Blueprint $table) {
            $table->id();
            $table->string('sg_franchise_id', 255);
            $table->string('sg_franchise_name', 255);
            $table->string('sg_franchise_contact_number', 255);
            $table->string('sg_franchise_email', 255);
            $table->string('sg_franchise_password', 255);
            $table->tinyInteger('sg_franchise_status')->default('0');
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
        Schema::dropIfExists('sg_franchise');
    }
}