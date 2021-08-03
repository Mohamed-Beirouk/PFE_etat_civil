<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMariagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mariages', function (Blueprint $table) {
            $table->id();
            $table->string('lieu_mariage');
            $table->string('path');
             $table->date('date_mariage');
             $table->unsignedBigInteger('agent_id');
             $table->unsignedBigInteger('homme_id');
           // $table->foreign('homme_id')->references('id')->on('citoyens');
             $table->unsignedBigInteger('femme_id');
           // $table->foreign('femme_id')->references('id')->on('citoyens');
            
            //mari et femme
           
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
        Schema::dropIfExists('mariages');
    }
}
