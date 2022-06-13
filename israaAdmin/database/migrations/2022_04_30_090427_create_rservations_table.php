<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); //changed this line
            $table->unsignedBigInteger('service_id'); 
            $table->string('nom');
            $table->string('prenom');
            $table->string('portable');
            $table->string('adresse');
            $table->string('nb_pax');
            $table->string('labelle_Service');
            $table->enum('etat', ["0","1","2"])->default("1");

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('rservations');
    }
}
