<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivorcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divorces', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_homme_id');
            $table->unsignedBigInteger('fk_femme_id');
            $table->string('certifica_divo');
            $table->string('jugemen_divo');
            $table->unsignedBigInteger('fk_agent_id');
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
        Schema::dropIfExists('divorces');
    }
}
