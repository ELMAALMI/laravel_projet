<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStagaireDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stagaire_documents', function (Blueprint $table)
        {
            $table->id("doc_id");
            $table->string("Cin",50);
            $table->string("cv",50);
            $table->string("assurence",50);
            $table->string("lettre_recommandation",50);
            $table->string("stagaire_id",50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stagaire_documents');
    }
}
