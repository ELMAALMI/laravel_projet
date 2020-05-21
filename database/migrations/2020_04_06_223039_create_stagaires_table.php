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
            $table->id();
            $table->string("cne",6)->unique();
            $table->string("nom",50);
            $table->string("prenom",50);
            $table->string("sexe",30);
            $table->string("date_naissance");
            $table->string("adresse");
            $table->string("tele");
            $table->string("nom_ecole",50);
            $table->string("nom_projet",50);
            $table->string("email",50)->unique();
            $table->string("date_debut");
            $table->string("date_fin");
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
