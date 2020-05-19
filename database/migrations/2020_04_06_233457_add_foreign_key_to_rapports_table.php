<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToRapportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rapports', function (Blueprint $table)
        {
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
        Schema::table('rapports', function (Blueprint $table)
        {
            $table->dropForeign("rapports_employee_id_foreign");
            //
        });
    }
    
}
