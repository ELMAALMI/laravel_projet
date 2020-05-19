<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table)
        {
            
            $table->foreign("job_id")->references("job_id")->on("jobs")->onDelete("cascade");
            $table->foreign("compte_id")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) 
        {
            $table->dropForeign("employees_job_id_foreign");
            $table->dropForeign("employees_compte_id_foreign");
        });
    }
}
