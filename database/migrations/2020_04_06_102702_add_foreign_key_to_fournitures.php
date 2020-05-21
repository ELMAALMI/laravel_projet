<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToFournitures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fournitures', function (Blueprint $table)
         {
          
            $table->foreign("fournisseur_id")->references("fournisseur_id")->on("fournisseurs")->onDelete('cascade');
            $table->foreign("service_id")->references("service_id")->on("services")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fournitures', function (Blueprint $table) 
        {
            $table->dropForeign("fournitures_fournisseur_id_foreign");
            $table->dropForeign("fournitures_service_id_foreign");
        });
    }
}
