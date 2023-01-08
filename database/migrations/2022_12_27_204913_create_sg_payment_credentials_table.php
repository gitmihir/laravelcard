<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSgPaymentCredentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sg_payment_credentials', function (Blueprint $table) {
            $table->id();
            $table->string('sg_pc_public_key', 500);
            $table->string('sg_pc_secret_key', 255);
            $table->tinyInteger('sg_pc_status')->default('0');
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
        Schema::dropIfExists('sg_payment_credentials');
    }
}