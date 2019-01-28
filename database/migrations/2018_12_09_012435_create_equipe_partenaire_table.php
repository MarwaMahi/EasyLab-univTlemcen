<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipePartenaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipe_partenaire', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('equipe_id')->unsigned();
            $table->integer('partenaire_id')->unsigned();
            
            $table->timestamps();
            $table-> foreign('equipe_id')->references('id')->on('equipes')->onDelete('cascade');
            $table-> foreign('partenaire_id')->references('id')->on('partenaire')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipe_partenaire');
    }
}
