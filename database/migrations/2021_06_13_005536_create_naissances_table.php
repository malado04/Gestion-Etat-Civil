<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNaissancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('naissances', function (Blueprint $table) {
            $table->id();
            // $table->string('certificat_non');
            // $table->string('certificat_naissance');
            $table->string('date_trans_regis')->nullable();
            $table->string('cni_pere');
            // $table->string('profession_pere')->nullable();
            // $table->string('domicile_pere')->nullable();
            $table->string('cni_mere');
            $table->string('profession_mere')->nullable();
            $table->string('domicile_mere')->nullable();
            $table->unsignedBigInteger('pere_id');
            $table->unsignedBigInteger('mere_id');
            $table->unsignedBigInteger('citoyen_id');
            $table->unsignedBigInteger('agent_id');
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
        Schema::dropIfExists('naissances');
    }
}
