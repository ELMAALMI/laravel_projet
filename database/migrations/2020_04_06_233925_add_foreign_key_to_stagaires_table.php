<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToStagairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stagaires', function (Blueprint $table) 
        {
            $table->foreign("encadrant_id")->references("cne")->on("employees")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stagaires', function (Blueprint $table)
        {
            $table->dropForeign("stagaires_encadrant_id_foreign");
        });
    }
}
