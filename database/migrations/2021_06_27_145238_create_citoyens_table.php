<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitoyensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citoyens', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nni');
            $table->string('password');
            $table->string('prenom');
            $table->string('nom');
            $table->date('date_naissance');
            $table->string('lieu_naissance');
            $table->string('sexe');
            $table->string('nationalite')->default('mauritanie');
            $table->bigInteger('nni_pere');
            $table->bigInteger('nni_mere');
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
        Schema::dropIfExists('citoyens');
    }
}
