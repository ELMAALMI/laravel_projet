<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements("client_id");
            $table->string("cin",20)->unique();
            $table->string("nom",40);
            $table->string("prenom",40);
            $table->string("sexe",40);
            $table->date("date_naissance");
            $table->string("tele",14)->unique();
            $table->string("email",60)->unique();
            $table->text("adresse");
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
        Schema::dropIfExists('clients');
    }
}
