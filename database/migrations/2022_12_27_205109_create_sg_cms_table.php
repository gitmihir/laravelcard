<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSgCmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sg_cms', function (Blueprint $table) {
            $table->id();
            $table->longText('sg_cms_T&C');
            $table->longText('sg_cms_privacy_policy');
            $table->longText('sg_cms_payment_policy');
            $table->longText('sg_cms_cookies_policy');
            $table->longText('sg_cms_copyright_line');

            $table->tinyInteger('sg_cms_status')->default('0');
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
        Schema::dropIfExists('sg_cms');
    }
}