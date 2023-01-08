<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSgSmtpDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sg_smtp_details', function (Blueprint $table) {
            $table->id();
            $table->string('sg_smtp_driver', 500);
            $table->string('sg_smtp_host', 500);
            $table->string('sg_smtp_port', 500);
            $table->string('sg_smtp_username', 500);
            $table->string('sg_smtp_password', 500);
            $table->string('sg_smtp_encryption', 500);
            $table->string('sg_smtp_from_address', 500);
            $table->string('sg_smtp_from_name', 500);
            $table->tinyInteger('sg_smtp_status')->default('0');
            //$table->timestamps();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sg_smtp_details');
    }
}