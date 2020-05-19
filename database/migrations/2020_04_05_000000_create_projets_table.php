<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets', function (Blueprint $table)
        {
            $table->bigIncrements("projet_id");
            $table->string("nom_projet",50);
            $table->date("date_demande");
            $table->date("date_livraison");
            $table->text("description");
            $table->string("etat",30);
            $table->unsignedbigInteger("client_id");
            $table->unsignedbigInteger("service_id");
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
        Schema::dropIfExists('projets');
    }
}
