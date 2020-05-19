<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToCommercialisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commercialises', function (Blueprint $table) 
        {
            $table->foreign("produit_id")->references("produit_id")->on("produits")->onDelete("cascade");
            $table->foreign("employee_id")->references("cne")->on("employees")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commercialises', function (Blueprint $table)
        {
            $table->dropForeign("commercialises_produit_id_foreign");
            $table->dropForeign("commercialises_employee_id_foreign");
            //
        });
    }
}
