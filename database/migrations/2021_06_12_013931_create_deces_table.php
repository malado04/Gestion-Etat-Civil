<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deces', function (Blueprint $table) {
            $table->id();
            $table->date('date_dece');
            $table->string('lieu_dece');
            $table->string('cni_def');
            $table->string('cni_temoin');
            $table->string('certifica_dece');
             $table->unsignedBigInteger('fk_defun_id')->nullable();
             $table->unsignedBigInteger('fk_temoin_id')->nullable();
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
        Schema::dropIfExists('deces');
    }
}
