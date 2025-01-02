<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJugementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jugements', function (Blueprint $table) {
            $table->id();
            $table->string('fk_jum_id');
            $table->string('certificat_non');
            $table->string('certificat_daccouchement');
            $table->string('certificat_temoin1');
            $table->string('certificat_temoin2');
            $table->string('quit_paiem');
            $table->string('fiche_vacc');
            $table->unsignedBigInteger('fk_user_id');
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
        Schema::dropIfExists('jugements');
    }
}
