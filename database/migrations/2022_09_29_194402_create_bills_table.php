<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_name', 255);
            $table->string('bill_number', 255);
            $table->string('bill_amount', 255);
            $table->string('product_name', 255);
            $table->string('product_price', 255);
            $table->string('product_quantity', 255);
            $table->string('product_total_amount', 255);
            $table->string('bill_added_by', 255);
            $table->string('bill_status', 255);
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
        Schema::dropIfExists('bills');
    }
}
