<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRdvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rdvs', function (Blueprint $table) {
            $table->id();
            $table->date('date_rdv');
            $table->string('besoin');
            $table->string('description');

            $table->string('etat')->default('non');
             $table->unsignedBigInteger('citoyen_id');
           // $table->foreign('citoyen_id')->references('id')->on('citoyens');

             $table->unsignedBigInteger('agent_id');
           // $table->foreign('agent_id')->references('id')->on('citoyens');
             
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
        Schema::dropIfExists('rdvs');
    }
}
