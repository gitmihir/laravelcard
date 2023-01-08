<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSgOurTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sg_our_team', function (Blueprint $table) {
            $table->id();
            $table->string('sg_our_team_title', 255);
            $table->string('sg_our_team_image', 255);
            $table->longText('sg_our_team_text');
            $table->tinyInteger('sg_our_team_status')->default('0');
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
        Schema::dropIfExists('sg_our_team');
    }
}