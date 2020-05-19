<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToFactureDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('facture_documents', function (Blueprint $table)
        {
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
        Schema::table('facture_documents', function (Blueprint $table)
        {
            $table->dropForeign("facture_documents_facture_id_foreign");
        });
    }
}
