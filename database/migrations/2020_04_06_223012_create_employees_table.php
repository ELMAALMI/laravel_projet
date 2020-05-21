<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("cin",6)->unique();
            $table->string("nom",50);
            $table->string("prenom",50);
            $table->string("date_naissance");
            $table->float("salaire");
            $table->string("tele");
            $table->string("sexe",30);
            $table->string("email",50);
            $table->string("adresse");
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
        Schema::dropIfExists('employees');
    }
}
