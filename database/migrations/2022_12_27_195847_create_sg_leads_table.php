<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSgLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sg_leads', function (Blueprint $table) {
            $table->id();
            $table->string('sg_lead_name', 255);
            $table->string('sg_lead_contact_number', 255);
            $table->string('sg_lead_email_address', 255);
            $table->tinyInteger('sg_lead_status')->default('0');
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
        Schema::dropIfExists('sg_leads');
    }
}