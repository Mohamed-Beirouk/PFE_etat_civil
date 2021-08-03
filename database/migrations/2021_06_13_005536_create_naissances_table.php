<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNaissancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('naissances', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('path');
            $table->unsignedBigInteger('citoyen_id');
            $table->unsignedBigInteger('agent_id');
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('naissances');
    }
}
