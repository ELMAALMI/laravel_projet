<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table)
        {
            $table->bigIncrements("facture_id");
            $table->enum("type_payment",['versement','cheque','espece']);
            $table->float("montements");
            $table->float("avance");
            $table->float("reste");
            $table->unsignedbigInteger("service_id")->nullable();
            $table->unsignedbigInteger("projet_id")->nullable();
            
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
        Schema::dropIfExists('factures');
    }
}
