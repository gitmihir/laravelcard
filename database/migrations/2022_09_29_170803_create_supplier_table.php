<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_name', 255);
            $table->string('supplier_company', 255);
            $table->string('supplier_contact_number', 255);
            $table->string('supplier_email', 255);
            $table->string('supplier_registered_address', 255);
            $table->string('supplier_communication_address', 255);
            $table->string('supplier_gst_number', 255);
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
        Schema::dropIfExists('supplier');
    }
}