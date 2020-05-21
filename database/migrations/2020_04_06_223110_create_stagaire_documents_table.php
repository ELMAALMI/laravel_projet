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
            $table->id();
            $table->string("cin")->default("imagecin");;
            $table->string("cv")->default("imagecv");
            $table->string("assurence")->default("imageassurance");;
            $table->string("lettre_recommandation")->default("imagelettre_recommandation");;
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
