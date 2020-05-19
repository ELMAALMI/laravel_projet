<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToBilanTabs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bilan_tabs', function (Blueprint $table)
        {
            $table->foreign("bilan_id")->references("bilan_id")->on("bilans")->onDelete("cascade");
            $table->foreign("facture_id")->references("facture_id")->on("factures")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bilan_tabs', function (Blueprint $table)
        {
            $table->dropForeign("bilan_tabs_bilan_id_foreign");
            $table->dropForeign("bilan_tabs_facture_id_foreign");
        });
    }
}
