<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSgReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sg_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('sg_review_title', 255);
            $table->string('sg_review_image', 255);
            $table->longText('sg_review_text');
            $table->tinyInteger('sg_review_status')->default('0');
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
        Schema::dropIfExists('sg_reviews');
    }
}