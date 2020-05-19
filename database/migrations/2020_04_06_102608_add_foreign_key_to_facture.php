<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToFacture extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('factures', function (Blueprint $table)
        {
            $table->foreign("service_id")->references("service_id")->on("services")->onDelete("cascade");
            $table->foreign("projet_id")->references("projet_id")->on("projets")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('factures', function (Blueprint $table)
        {
            $table->dropForeign("factures_service_id_foreign");
            $table->dropForeign("factures_projet_id_foreign");
        });
    }
}
