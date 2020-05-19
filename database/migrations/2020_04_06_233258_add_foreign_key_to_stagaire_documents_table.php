<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToStagaireDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stagaire_documents', function (Blueprint $table)
        {
            $table->foreign("stagaire_id")->references("cne")->on("stagaires")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stagaire_documents', function (Blueprint $table)
        {
            $table->dropForeign("stagaire_documents_stagaire_id_foreign");
        });
    }
}
