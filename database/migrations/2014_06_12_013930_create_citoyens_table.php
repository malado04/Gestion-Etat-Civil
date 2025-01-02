<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitoyensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citoyens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('code_agent')->nullable();
            $table->bigInteger('cni_rgi');
            $table->string('prenom');
            $table->string('nom')->nullable();
            $table->string('email');
            $table->string('password');
            $table->string('sexe');
            $table->bigInteger('age')->nullable();
            $table->date('date_naissance');
            $table->time('heure_naissance')->nullable();
            $table->string('lieu_naissance');
            $table->bigInteger('tel')->nullable();
            $table->string('quartier')->nullable();
            $table->string('ville')->nullable();
            $table->string('profession')->nullable();
            $table->string('nationalite')->default('Sénégalais');
            $table->unsignedBigInteger('cni_pere')->nullable();
            $table->unsignedBigInteger('cni_mere')->nullable();
            $table->unsignedBigInteger('agent_id')->nullable();
            // $table->boolean('dece')->default('false');
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
        Schema::dropIfExists('citoyens');
    }
}
