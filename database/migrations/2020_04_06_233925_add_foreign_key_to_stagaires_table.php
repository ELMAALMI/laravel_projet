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
            $table->foreignId("employee_id")->constrained();
            $table->foreignId("job_id")->constrained();
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
            $table->dropForeign("stagaires_employee_id_foreign");
            $table->dropForeign("stagaires_job_id_foreign");
        });
    }
}
