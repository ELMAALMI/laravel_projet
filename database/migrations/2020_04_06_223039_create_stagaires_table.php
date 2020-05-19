<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStagairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stagaires', function (Blueprint $table) {
            $table->string("cne",10)->primary();
            $table->string("nom",50);
            $table->string("prenom",50);
            $table->string("sexe",30);
            $table->date("date_naissance");
            $table->string("nom_ecole",50);
            $table->date("date_debut");
            $table->date("date_fin");
            $table->string("encadrant_id",10);
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
        Schema::dropIfExists('stagaires');
    }
}
