<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRdvsinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('rdvsins');
        
        Schema::create('rdvsins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('telephone');
            $table->unsignedBigInteger('agent_id');
            $table->date('date_rdv');
            $table->string('etat')->default('non');
            $table->foreign('agent_id')->references('id')->on('users');
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
        Schema::dropIfExists('rdvsins');
    }
}
