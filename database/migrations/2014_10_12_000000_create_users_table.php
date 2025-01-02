<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('code_agent')->nullable();
            $table->bigInteger('cni_rgi')->nullable();
            $table->string('name')->nullable();
            $table->string('prenom')->nullable();
            $table->string('nom')->nullable();
            $table->string('email');
            $table->string('sexe')->nullable();
            $table->bigInteger('age')->nullable();
            $table->date('date_naissance')->nullable();
            $table->time('heure_naissance')->nullable();
            $table->string('lieu_naissance')->nullable();
            $table->bigInteger('tel')->nullable();
            $table->string('quartier')->nullable();
            $table->string('ville')->nullable();
            $table->string('profession')->nullable();
            $table->string('nationalite')->default('Sénégalais');
            $table->unsignedBigInteger('cni_pere')->nullable();
            $table->unsignedBigInteger('cni_mere')->nullable();
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
