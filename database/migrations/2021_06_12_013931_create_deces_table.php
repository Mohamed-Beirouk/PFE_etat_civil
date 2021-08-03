<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deces', function (Blueprint $table) {
            $table->id();
            $table->string('path');
             $table->unsignedBigInteger('citoyen_id');
            $table->foreign('citoyen_id')->references('id')->on('citoyens');
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
        Schema::dropIfExists('deces');
    }
}
