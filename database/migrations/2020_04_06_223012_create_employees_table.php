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
            $table->string("cne",10)->primary();
            $table->string("nom",50);
            $table->string("prenom",50);
            $table->date("date_naissance");
            $table->float("salaire");
            $table->string("tele",14);
            $table->string("sexe",30);
            $table->string("email",50);
            $table->string("adresse",50);
            $table->unsignedBigInteger("job_id");
            $table->unsignedBigInteger("compte_id");
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
