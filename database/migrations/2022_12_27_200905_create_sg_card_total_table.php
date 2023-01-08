<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSgCardTotalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sg_card_total', function (Blueprint $table) {
            $table->id();
            $table->string('sg_ct_user_id', 255);
            // $table->string('sg_ct_user_email', 255);
            // $table->string('sg_ct_user_phone', 255);

            /* Card Total */
            $table->string('sg_ct_total_product_count', 255);
            $table->tinyInteger('sg_ct_status')->default('0');
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
        Schema::dropIfExists('sg_card_total');
    }
}